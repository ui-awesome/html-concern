<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasListCollection;
use UIAwesome\Html\Concern\Component\HasListContainerCollection;

final class HasListContainerCollectionTest extends \PHPUnit\Framework\TestCase
{
    public function testAttributes(): void
    {
        $instance = new class () {
            use HasListCollection;
        };

        $instance = $instance->listAttributes(['class' => 'value']);
        $instance = $instance->listAttributes(['disabled' => true]);

        $this->assertSame(['class' => 'value', 'disabled' => true], $instance->getListAttributes());
    }

    public function testClass(): void
    {
        $instance = new class () {
            use HasListContainerCollection;

            public function getListContainerClass(): string
            {
                return $this->listContainerAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getListContainerClass());

        $instance = $instance->listContainerClass('class');

        $this->assertSame('class', $instance->getListContainerClass());

        $instance = $instance->listContainerClass('class-1');

        $this->assertSame('class class-1', $instance->getListContainerClass());

        $instance = $instance->listContainerClass('override-class', true);

        $this->assertSame('override-class', $instance->getListContainerClass());
    }

    public function testTag(): void
    {
        $instance = new class () {
            use HasListContainerCollection;

            public function getListContainerTag(): false|string
            {
                return $this->listContainerTag;
            }
        };

        $this->assertFalse($instance->getListContainerTag());

        $instance = $instance->listContainerTag('div');

        $this->assertSame('div', $instance->getListContainerTag());

        $instance = $instance->listContainerTag('span');

        $this->assertSame('span', $instance->getListContainerTag());

        $instance = $instance->listContainerTag(false);

        $this->assertFalse($instance->getListContainerTag());
    }

    public function testTagExceptionWithEmptyValue(): void
    {
        $instance = new class () {
            use HasListContainerCollection;
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The list container tag must be a non-empty string.');

        $instance->listContainerTag('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasListContainerCollection;
        };

        $this->assertNotSame($instance, $instance->listContainerAttributes([]));
        $this->assertNotSame($instance, $instance->listContainerClass(''));
        $this->assertNotSame($instance, $instance->listContainerTag(false));
    }
}
