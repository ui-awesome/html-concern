<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasSuffixItems;

final class HasSuffixItemsTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasSuffixItems;
        };

        $this->assertNotSame($instance, $instance->suffixItems(''));
    }
}
