<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests;

use UIAwesome\Html\Concern\HasSuffixCollection;

final class HasSuffixCollectionTest extends \PHPUnit\Framework\TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasSuffixCollection;

            public function getSuffixClass(): string
            {
                return $this->suffixAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getSuffixClass());

        $instance = $instance->suffixClass('class');

        $this->assertSame('class', $instance->getSuffixClass());

        $instance = $instance->suffixClass('class-1');

        $this->assertSame('class class-1', $instance->getSuffixClass());

        $instance = $instance->suffixClass('override-class', true);

        $this->assertSame('override-class', $instance->getSuffixClass());
    }

    public function testSuffixTag(): void
    {
        $instance = new class () {
            use HasSuffixCollection;

            public function getSuffixTag(): false|string
            {
                return $this->suffixTag;
            }
        };

        $this->assertFalse($instance->getSuffixTag());

        $instance = $instance->suffixTag();

        $this->assertSame('div', $instance->getSuffixTag());

        $instance = $instance->suffixTag('span');

        $this->assertSame('span', $instance->getSuffixTag());

        $instance = $instance->suffixTag(false);

        $this->assertFalse($instance->getSuffixTag());
    }

    public function testTagException(): void
    {
        $instance = new class () {
            use HasSuffixCollection;
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The suffix tag must be a non-empty string.');

        $instance->suffixTag('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasSuffixCollection;
        };

        $this->assertNotSame($instance, $instance->suffix(''));
        $this->assertNotSame($instance, $instance->suffixAttributes([]));
        $this->assertNotSame($instance, $instance->suffixClass(''));
        $this->assertNotSame($instance, $instance->suffixTag(false));
    }
}
