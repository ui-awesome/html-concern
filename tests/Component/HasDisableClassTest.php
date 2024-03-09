<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasDisableClass;

final class HasDisableClassTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasDisableClass;

            public array $linkAttributes = [];
        };

        $this->assertNotSame($instance, $instance->disableClass($instance->linkAttributes));
        $this->assertNotSame($instance, $instance->disableClass($instance->linkAttributes, true));
    }

    public function testOverrideActiveClass(): void
    {
        $instance = new class () {
            use HasDisableClass;

            public array $linkAttributes = [];

            public function getOverrideDisableClass(): bool
            {
                return $this->overrideDisableClass;
            }
        };

        $this->assertFalse($instance->getOverrideDisableClass());

        $instance = $instance->disableClass($instance->linkAttributes);

        $this->assertFalse($instance->getOverrideDisableClass());

        $instance = $instance->disableClass($instance->linkAttributes, true);

        $this->assertTrue($instance->getOverrideDisableClass());
    }
}
