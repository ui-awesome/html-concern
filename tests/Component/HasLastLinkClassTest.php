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

    public function testOverrideActiveClass(): void
    {
        $instance = new class () {
            use HasLastLinkClass;

            public array $linkAttributes = [];

            public function getOverrideLastLinkClass(): bool
            {
                return $this->overrideLastLinkClass;
            }
        };

        $this->assertTrue($instance->getOverrideLastLinkClass());

        $instance = $instance->lastLinkClass($instance->linkAttributes);

        $this->assertTrue($instance->getOverrideLastLinkClass());

        $instance = $instance->lastLinkClass($instance->linkAttributes, false);

        $this->assertFalse($instance->getOverrideLastLinkClass());
    }
}
