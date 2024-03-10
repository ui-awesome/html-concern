<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasFirstLinkClass;

final class HasFirstLinkClassTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasFirstLinkClass;
        };

        $this->assertNotSame($instance, $instance->firstLinkClass(''));
    }
}
