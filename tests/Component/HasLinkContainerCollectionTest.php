<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasLinkContainerCollection;

final class HasLinkContainerCollectionTest extends \PHPUnit\Framework\TestCase
{
    public function testAttributes(): void
    {
        $instance = new class () {
            use HasLinkContainerCollection;
        };

        $instance = $instance->linkContainerAttributes(['class' => 'value']);
        $instance = $instance->linkContainerAttributes(['disabled' => true]);

        $this->assertSame(['class' => 'value', 'disabled' => true], $instance->getLinkContainerAttributes());
    }

    public function testClass(): void
    {
        $instance = new class () {
            use HasLinkContainerCollection;

            public function getLinkContainerClass(): string
            {
                return $this->linkContainerAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getLinkContainerClass());

        $instance = $instance->linkContainerClass('class');

        $this->assertSame('class', $instance->getLinkContainerClass());

        $instance = $instance->linkContainerClass('class-1');

        $this->assertSame('class class-1', $instance->getLinkContainerClass());

        $instance = $instance->linkContainerClass('override-class', true);

        $this->assertSame('override-class', $instance->getLinkContainerClass());
    }

    public function testTagExceptionWithEmptyValue(): void
    {
        $instance = new class () {
            use HasLinkContainerCollection;
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The link container tag must be a non-empty string.');

        $instance->linkContainerTag('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasLinkContainerCollection;
        };

        $this->assertNotSame($instance, $instance->linkContainerAttributes([]));
        $this->assertNotSame($instance, $instance->linkContainerClass(''));
        $this->assertNotSame($instance, $instance->linkContainerTag());
    }
}
