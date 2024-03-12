<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests;

use UIAwesome\Html\Concern\HasTag;

final class HasTagTest extends \PHPUnit\Framework\TestCase
{
    public function testException(): void
    {
        $instance = new class () {
            use HasTag;
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The tag cannot be an empty string.');

        $instance->tag('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasTag;

            protected string $tagName = '';
        };

        $this->assertNotSame($instance, $instance->tag('div'));
    }

    public function testTag(): void
    {
        $instance = new class () {
            use HasTag;

            public function getTag(): false|string
            {
                return $this->tag;
            }
        };

        $this->assertFalse($instance->getTag());

        $instance = $instance->tag('div');

        $this->assertSame('div', $instance->getTag());

        $instance = $instance->tag('span');

        $this->assertSame('span', $instance->getTag());

        $instance = $instance->tag(false);

        $this->assertFalse($instance->getTag());
    }
}
