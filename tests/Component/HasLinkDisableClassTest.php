<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasLinkDisableClass;

final class HasLinkDisableClassTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasLinkDisableClass;

            public array $linkAttributes = [];
        };

        $this->assertNotSame($instance, $instance->linkDisableClass($instance->linkAttributes));
        $this->assertNotSame($instance, $instance->linkDisableClass($instance->linkAttributes, true));
    }

    public function testOverrideActiveClass(): void
    {
        $instance = new class () {
            use HasLinkDisableClass;

            public array $linkAttributes = [];

            public function getOverrideLinkDisableClass(): bool
            {
                return $this->overrideLinkDisableClass;
            }
        };

        $this->assertFalse($instance->getOverrideLinkDisableClass());

        $instance = $instance->linkDisableClass($instance->linkAttributes);

        $this->assertFalse($instance->getOverrideLinkDisableClass());

        $instance = $instance->linkDisableClass($instance->linkAttributes, true);

        $this->assertTrue($instance->getOverrideLinkDisableClass());
    }
}
