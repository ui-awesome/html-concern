<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasLastItemClass;

final class HasLastItemClassTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasLastItemClass;
        };

        $this->assertNotSame($instance, $instance->lastItemClass(''));
    }
}
