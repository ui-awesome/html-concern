<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Tests;

use UIAwesome\Html\Concern\{HasLabelCollection, Tests\Support\InputWidget};

final class HasLabelCollectionTest extends \PHPUnit\Framework\TestCase
{
    public function testClass(): void
    {
        $instance = new class () {
            use HasLabelCollection;

            public function getLabelClass(): string
            {
                return $this->labelAttributes['class'] ?? '';
            }
        };

        $this->assertEmpty($instance->getLabelClass());

        $instance = $instance->labelClass('class');

        $this->assertSame('class', $instance->getLabelClass());

        $instance = $instance->labelClass('class-1');

        $this->assertSame('class class-1', $instance->getLabelClass());

        $instance = $instance->labelClass('override-class', true);

        $this->assertSame('override-class', $instance->getLabelClass());
    }

    public function testDisableLabel(): void
    {
        $instance = new class () {
            use HasLabelCollection;

            public function isDisableLabel(): bool
            {
                return $this->disableLabel;
            }
        };

        $instance = $instance->disableLabel();

        $this->assertTrue($instance->isDisableLabel());
    }

    public function testLabel(): void
    {
        $instance = new class () {
            use HasLabelCollection;

            public function getLabel(): string
            {
                return $this->label;
            }
        };

        $inputWidget = new InputWidget();
        $instance = $instance->label('value', $inputWidget);

        $this->assertSame('value<input type="text" />', $instance->getLabel());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasLabelCollection;
        };

        $this->assertNotSame($instance, $instance->disableLabel());
        $this->assertNotSame($instance, $instance->label(''));
        $this->assertNotSame($instance, $instance->labelAttributes([]));
        $this->assertNotSame($instance, $instance->labelClass(''));
        $this->assertNotSame($instance, $instance->labelFor(''));
    }
}
