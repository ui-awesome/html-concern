<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests;

use UIAwesome\Html\Concern\HasTemplate;

final class HasTemplateTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasTemplate;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->template(''));
    }
}
