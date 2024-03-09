<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasActivateItems;

final class HasActivateItemsTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasActivateItems;
        };

        $this->assertNotSame($instance, $instance->activateItems(true));
    }
}
