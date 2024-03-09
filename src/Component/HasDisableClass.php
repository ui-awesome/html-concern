<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Component;

/**
 * Is used by widgets that implement the disable class method.
 */
trait HasDisableClass
{
    /**
     * @psalm-var string|string[]
     */
    protected array|string $disableClass = '';
    protected bool $overrideDisableClass = false;

    /**
     * Set the `CSS` class to be appended to the disable class.
     *
     * @param array|string $value The `CSS` class to be appended to the disable class.
     * @param bool $override Whether to override the current disable class or not.
     *
     * @return static A new instance of the current class with the specified disable class and override flag.
     *
     * @psalm-param string|string[] $value
     */
    public function disableClass(array|string $value, bool $override = false): static
    {
        $new = clone $this;
        $new->disableClass = $value;
        $new->overrideDisableClass = $override;

        return $new;
    }
}
