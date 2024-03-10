<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasFirstItemClass;

final class HasFirstItemClassTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasFirstItemClass;
        };

        $this->assertNotSame($instance, $instance->firstItemClass(''));
    }
}
