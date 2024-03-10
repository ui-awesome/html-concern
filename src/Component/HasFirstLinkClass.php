<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Component;

/**
 * Is used by widgets that implement the first link class method.
 */
trait HasFirstLinkClass
{
    protected string $firstLinkClass = '';

    /**
     * Set the first link class.
     *
     * @param string $value The `CSS` class that will be assigned to the first link.
     *
     * @return static A new instance of the current class with the specified first link class.
     */
    public function firstLinkClass(string $value): static
    {
        $new = clone $this;
        $new->firstLinkClass = $value;

        return $new;
    }
}
