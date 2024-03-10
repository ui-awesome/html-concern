<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Component;

/**
 * Is used by widgets that implement the first link class method.
 */
trait HasFirstLinkClass
{
    protected array|string $firstLinkClass = '';
    protected bool $overrideFirstLinkClass = true;

    /**
     * Set the first link class.
     *
     * @param array|string $value The `CSS` class that will be assigned to the first link.
     * @param bool $override Whether to override the current first link class or not.
     *
     * @return static A new instance of the current class with the specified first link class.
     */
    public function firstLinkClass(array|string $value, bool $override = true): static
    {
        $new = clone $this;
        $new->firstLinkClass = $value;
        $new->overrideFirstLinkClass = $override;

        return $new;
    }
}
