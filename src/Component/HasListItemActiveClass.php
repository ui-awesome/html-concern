<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Component;

/**
 * Is used by widgets which implement the list item active class method.
 */
trait HasListItemActiveClass
{
    /**
     * @psalm-var string|string[]
     */
    protected array|string $listItemActiveClass = '';
    protected bool $overrideListItemActiveClass = true;

    /**
     * Set the `CSS` class to be appended to the list item active class.
     *
     * @param array|string $value The `CSS` class to be appended to the list item active class.
     * @param bool $override Whether to override the current list item active class or not.
     *
     * @return static A new instance of the current class with the specified list item active class and override flag.
     *
     * @psalm-param string|string[] $value
     */
    public function listItemActiveClass(array|string $value, bool $override = true): static
    {
        $new = clone $this;
        $new->listItemActiveClass = $value;
        $new->overrideListItemActiveClass = $override;

        return $new;
    }
}
