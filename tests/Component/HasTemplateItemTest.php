<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasTemplateItem;

final class HasTemplateItemTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasTemplateItem;
        };

        $this->assertNotSame($instance, $instance->templateItem(''));
    }
}
