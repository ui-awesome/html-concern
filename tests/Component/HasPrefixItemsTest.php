<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasPrefixItems;

final class HasPrefixItemsTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasPrefixItems;
        };

        $this->assertNotSame($instance, $instance->prefixItems(''));
    }
}
