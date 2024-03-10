<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasListItemActiveClass;

final class HasListItemActiveClassTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasListItemActiveClass;

            public array $listItemAttributes = [];
        };

        $this->assertNotSame($instance, $instance->listItemActiveClass($instance->listItemAttributes));
        $this->assertNotSame($instance, $instance->listItemActiveClass($instance->listItemAttributes, false));
    }

    public function testOverrideActiveClass(): void
    {
        $instance = new class () {
            use HasListItemActiveClass;

            public array $listItemAttributes = [];

            public function getOverrideListItemActiveClass(): bool
            {
                return $this->overrideListItemActiveClass;
            }
        };

        $this->assertTrue($instance->getOverrideListItemActiveClass());

        $instance = $instance->listItemActiveClass($instance->listItemAttributes);

        $this->assertTrue($instance->getOverrideListItemActiveClass());

        $instance = $instance->listItemActiveClass($instance->listItemAttributes, false);

        $this->assertFalse($instance->getOverrideListItemActiveClass());
    }
}