<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasLastLinkClass;

final class HasLastLinkClassTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasLastLinkClass;
        };

        $this->assertNotSame($instance, $instance->lastLinkClass(''));
    }
}
