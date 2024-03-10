<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasLinkActiveClass;

final class HasLinkActiveClassTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasLinkActiveClass;

            public array $linkAttributes = [];
        };

        $this->assertNotSame($instance, $instance->linkActiveClass($instance->linkAttributes));
        $this->assertNotSame($instance, $instance->linkActiveClass($instance->linkAttributes, true));
    }

    public function testOverrideActiveClass(): void
    {
        $instance = new class () {
            use HasLinkActiveClass;

            public array $linkAttributes = [];

            public function getOverrideLinkActiveClass(): bool
            {
                return $this->overrideLinkActiveClass;
            }
        };

        $this->assertTrue($instance->getOverrideLinkActiveClass());

        $instance = $instance->linkActiveClass($instance->linkAttributes);

        $this->assertTrue($instance->getOverrideLinkActiveClass());

        $instance = $instance->linkActiveClass($instance->linkAttributes, false);

        $this->assertFalse($instance->getOverrideLinkActiveClass());
    }
}
