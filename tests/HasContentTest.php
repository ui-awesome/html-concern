<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests;

use UIAwesome\Html\Concern\HasContent;

final class HasContentTest extends \PHPUnit\Framework\TestCase
{
    public function testGet(): void
    {
        $instance = new class () {
            use HasContent;
        };

        $this->assertSame('', $instance->getContent());

        $instance = $instance->content('value');

        $this->assertSame('value', $instance->getContent());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasContent;

            protected string $containerTag = 'div';
        };

        $this->assertNotSame($instance, $instance->content(''));
    }

    public function testXSS(): void
    {
        $instance = new class () {
            use HasContent;

            public function getContent(): string
            {
                return $this->content;
            }
        };

        $instance = $instance->content("<script>alert('Hack');</script>");

        $this->assertEmpty($instance->getContent());
    }
}
