<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests;

use UIAwesome\Html\Concern\HasUncheckedCollection;

final class HasUnchekedCollectionTest extends \PHPUnit\Framework\TestCase
{
    public function testAttributes(): void
    {
        $instance = new class () {
            use HasUncheckedCollection;

            public function getUncheckedAttributes(): array
            {
                return $this->uncheckAttributes;
            }
        };

        $instance = $instance->uncheckedAttributes(['class' => 'value']);
        $instance = $instance->uncheckedAttributes(['disabled' => true]);

        $this->assertSame(['class' => 'value', 'disabled' => true], $instance->getUncheckedAttributes());
    }

    public function testClass(): void
    {
        $instance = new class () {
            use HasUncheckedCollection;

            public function getClass(): string
            {
                return $this->uncheckAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getClass());

        $instance = $instance->uncheckedClass('class');

        $this->assertSame('class', $instance->getClass());

        $instance = $instance->uncheckedClass('class-1');

        $this->assertSame('class class-1', $instance->getClass());

        $instance = $instance->uncheckedClass('override-class', true);

        $this->assertSame('override-class', $instance->getClass());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasUncheckedCollection;
        };

        $this->assertNotSame($instance, $instance->uncheckedAttributes([]));
        $this->assertNotSame($instance, $instance->uncheckedClass(''));
        $this->assertNotSame($instance, $instance->uncheckedValue(null));
    }
}
