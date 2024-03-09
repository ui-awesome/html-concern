<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Component;

/**
 * Is used by widgets which implement the activeClass method.
 */
trait HasActiveClass
{
    /**
     * @psalm-var string|string[]
     */
    protected array|string $activeClass = '';
    protected bool $overrideActiveClass = false;

    /**
     * Set the `CSS` class to be appended to the active class.
     *
     * @param array|string $value The `CSS` class to be appended to the active class.
     * @param bool $override Whether to override the current active class or not.
     *
     * @return static A new instance of the current class with the specified active class and override flag.
     *
     * @psalm-param string|string[] $value
     */
    public function activeClass(array|string $value, bool $override = false): static
    {
        $new = clone $this;
        $new->activeClass = $value;
        $new->overrideActiveClass = $override;

        return $new;
    }
}
