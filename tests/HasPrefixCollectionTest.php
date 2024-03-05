<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests;

use UIAwesome\Html\Concern\HasPrefixCollection;

final class HasPrefixCollectionTest extends \PHPUnit\Framework\TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasPrefixCollection;

            public function getPrefixClass(): string
            {
                return $this->prefixAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getPrefixClass());

        $instance = $instance->prefixClass('class');

        $this->assertSame('class', $instance->getPrefixClass());

        $instance = $instance->prefixClass('class-1');

        $this->assertSame('class class-1', $instance->getPrefixClass());

        $instance = $instance->prefixClass('override-class', true);

        $this->assertSame('override-class', $instance->getPrefixClass());
    }

    public function testPrefixTag(): void
    {
        $instance = new class () {
            use HasPrefixCollection;

            public function getPrefixTag(): false|string
            {
                return $this->prefixTag;
            }
        };

        $this->assertFalse($instance->getPrefixTag());

        $instance = $instance->prefixTag();

        $this->assertSame('div', $instance->getPrefixTag());

        $instance = $instance->prefixTag('span');

        $this->assertSame('span', $instance->getPrefixTag());

        $instance = $instance->prefixTag(false);

        $this->assertFalse($instance->getPrefixTag());
    }

    public function testTagException(): void
    {
        $instance = new class () {
            use HasPrefixCollection;
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The prefix tag must be a non-empty string.');

        $instance->prefixTag('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasPrefixCollection;
        };

        $this->assertNotSame($instance, $instance->prefix(''));
        $this->assertNotSame($instance, $instance->prefixAttributes([]));
        $this->assertNotSame($instance, $instance->prefixClass(''));
        $this->assertNotSame($instance, $instance->prefixTag(false));
    }
}
