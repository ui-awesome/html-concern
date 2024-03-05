<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests;

use UIAwesome\Html\Concern\HasAttributes;

final class HasAttributesTest extends \PHPUnit\Framework\TestCase
{
    public function testAttributes(): void
    {
        $instance = new class () {
            use HasAttributes;
        };

        $instance = $instance->attributes(['class' => 'value']);
        $instance = $instance->attributes(['disabled' => true]);

        $this->assertSame(['class' => 'value', 'disabled' => true], $instance->getAttributes());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasAttributes;
        };

        $this->assertNotSame($instance, $instance->attributes([]));
    }
}
