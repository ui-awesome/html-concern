<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasTemplateLinkItem;

final class HasTemplateLinkItemTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasTemplateLinkItem;
        };

        $this->assertNotSame($instance, $instance->templateLinkItem(''));
    }
}
