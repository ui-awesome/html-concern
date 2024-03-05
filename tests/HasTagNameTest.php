<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests;

use UIAwesome\Html\Concern\HasTagName;

final class HasTagNameTest extends \PHPUnit\Framework\TestCase
{
    public function testException(): void
    {
        $instance = new class () {
            use HasTagName;
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('class widget must have a tag name.');

        $instance->tagName('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasTagName;

            protected string $tagName = '';
        };

        $this->assertNotSame($instance, $instance->tagName('div'));
    }
}
