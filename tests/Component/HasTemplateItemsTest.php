<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasTemplateItems;

final class HasTemplateItemsTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasTemplateItems;
        };

        $this->assertNotSame($instance, $instance->templateItems(''));
    }
}
