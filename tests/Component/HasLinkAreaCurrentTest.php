<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasLinkAreaCurrent;

final class HasLinkAreaCurrentTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasLinkAreaCurrent;
        };

        $this->assertNotSame($instance, $instance->linkAriaCurrent(false));
    }

    public function testIsLinkAriaCurrent(): void
    {
        $instance = new class () {
            use HasLinkAreaCurrent;
        };

        $this->assertFalse($instance->isLinkAriaCurrent());
        $this->assertTrue($instance->linkAriaCurrent(true)->isLinkAriaCurrent());
    }
}
