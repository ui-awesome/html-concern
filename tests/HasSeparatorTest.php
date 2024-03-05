<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests;

use UIAwesome\Html\Concern\HasSeparator;

final class HasSeparatorTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasSeparator;
        };

        $this->assertNotSame($instance, $instance->separator(''));
    }
}
