<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasToggle;

final class HasToggleTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasToggle;
        };

        $this->assertNotSame($instance, $instance->toggle(''));
    }
}
