<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests\Component;

use UIAwesome\Html\Concern\Component\HasCurrentPath;

final class HasCurrentPathTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasCurrentPath;
        };

        $this->assertNotSame($instance, $instance->currentPath(''));
    }
}
