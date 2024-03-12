<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasListItemAreaCurrent;

final class HasListItemAreaCurrentTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasListItemAreaCurrent;
        };

        $this->assertNotSame($instance, $instance->listItemAriaCurrent());
    }

    public function testIsLinkAriaCurrent(): void
    {
        $instance = new class () {
            use HasListItemAreaCurrent;
        };

        $this->assertFalse($instance->isListItemAriaCurrent());
        $this->assertTrue($instance->listItemAriaCurrent()->isListItemAriaCurrent());
    }
}
