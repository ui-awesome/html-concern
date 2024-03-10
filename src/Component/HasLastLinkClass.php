<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Component;

/**
 * Is used by widgets that implement the last link class method.
 */
trait HasLastLinkClass
{
    protected array|string $lastLinkClass = '';
    protected bool $overrideLastLinkClass = true;

    /**
     * Sets the last link class.
     *
     * @param array|string $value The `CSS` class that will be assigned to the last link.
     * @param bool $override Whether to override the current last link class or not.
     *
     * @return static A new instance of the current class with the specified last link class.
     */
    public function lastLinkClass(array|string $value, bool $override = true): static
    {
        $new = clone $this;
        $new->lastLinkClass = $value;
        $new->overrideLastLinkClass = $override;

        return $new;
    }
}