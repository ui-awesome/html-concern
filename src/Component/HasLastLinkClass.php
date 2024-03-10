<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Component;

/**
 * Is used by widgets that implement the last link class method.
 */
trait HasLastLinkClass
{
    protected string $lastLinkClass = '';

    /**
     * Sets the last link class.
     *
     * @param string $value The `CSS` class that will be assigned to the last link.
     *
     * @return static A new instance of the current class with the specified last link class.
     */
    public function lastLinkClass(string $value): static
    {
        $new = clone $this;
        $new->lastLinkClass = $value;

        return $new;
    }
}
