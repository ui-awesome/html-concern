<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests;

use UIAwesome\Html\Concern\HasContainerCollection;

final class HasContainerCollectionTest extends \PHPUnit\Framework\TestCase
{
    public function testAttributes(): void
    {
        $instance = new class () {
            use HasContainerCollection;
        };

        $instance = $instance->containerAttributes(['class' => 'value']);
        $instance = $instance->containerAttributes(['disabled' => true]);

        $this->assertSame(['class' => 'value', 'disabled' => true], $instance->getContainerAttributes());
    }

    public function testClass(): void
    {
        $instance = new class () {
            use HasContainerCollection;

            public function getContainerClass(): string
            {
                return $this->containerAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getContainerClass());

        $instance = $instance->containerClass('class');

        $this->assertSame('class', $instance->getContainerClass());

        $instance = $instance->containerClass('class-1');

        $this->assertSame('class class-1', $instance->getContainerClass());

        $instance = $instance->containerClass('override-class', true);

        $this->assertSame('override-class', $instance->getContainerClass());
    }

    public function testTag(): void
    {
        $instance = new class () {
            use HasContainerCollection;

            public function getContainerTag(): false|string
            {
                return $this->containerTag;
            }
        };

        $this->assertFalse($instance->getContainerTag());

        $instance = $instance->containerTag('div');

        $this->assertSame('div', $instance->getContainerTag());

        $instance = $instance->containerTag('span');

        $this->assertSame('span', $instance->getContainerTag());

        $instance = $instance->containerTag(false);

        $this->assertFalse($instance->getContainerTag());
    }

    public function testTagExceptionWithEmptyValue(): void
    {
        $instance = new class () {
            use HasContainerCollection;
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The container tag must be a non-empty string.');

        $instance->containerTag('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasContainerCollection;
        };

        $this->assertNotSame($instance, $instance->containerAttributes([]));
        $this->assertNotSame($instance, $instance->containerClass(''));
        $this->assertNotSame($instance, $instance->containerTag(false));
    }
}
