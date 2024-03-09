<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasLinkCollection;

final class HasLinkCollectionTest extends \PHPUnit\Framework\TestCase
{
    public function testAttributes(): void
    {
        $instance = new class () {
            use HasLinkCollection;
        };

        $instance = $instance->linkAttributes(['class' => 'value']);
        $instance = $instance->linkAttributes(['disabled' => true]);

        $this->assertSame(['class' => 'value', 'disabled' => true], $instance->getLinkAttributes());
    }

    public function testClass(): void
    {
        $instance = new class () {
            use HasLinkCollection;

            public function getLinkClass(): string
            {
                return $this->linkAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getLinkClass());

        $instance = $instance->linkClass('class');

        $this->assertSame('class', $instance->getLinkClass());

        $instance = $instance->linkClass('class-1');

        $this->assertSame('class class-1', $instance->getLinkClass());

        $instance = $instance->linkClass('override-class', true);

        $this->assertSame('override-class', $instance->getLinkClass());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasLinkCollection;
        };

        $this->assertNotSame($instance, $instance->linkAttributes([]));
        $this->assertNotSame($instance, $instance->linkClass(''));
    }
}