<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasActiveClass;

final class HasActiveClassTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasActiveClass;

            public array $linkAttributes = [];
        };

        $this->assertNotSame($instance, $instance->activeClass($instance->linkAttributes));
        $this->assertNotSame($instance, $instance->activeClass($instance->linkAttributes, true));
    }

    public function testOverrideActiveClass(): void
    {
        $instance = new class () {
            use HasActiveClass;

            public array $linkAttributes = [];

            public function getOverrideActiveClass(): bool
            {
                return $this->overrideActiveClass;
            }
        };

        $this->assertFalse($instance->getOverrideActiveClass());

        $instance = $instance->activeClass($instance->linkAttributes);

        $this->assertFalse($instance->getOverrideActiveClass());

        $instance = $instance->activeClass($instance->linkAttributes, true);

        $this->assertTrue($instance->getOverrideActiveClass());
    }
}
