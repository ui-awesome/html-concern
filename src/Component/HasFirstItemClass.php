<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Component;

/**
 * Is used by widgets that implement the first item class method.
 */
trait HasFirstItemClass
{
    protected array|string $firstItemClass = '';
    protected bool $overrideFirstItemClass = true;

    /**
     * Set the first item class.
     *
     * @param array|string $value The `CSS` class that will be assigned to the first item.
     * @param bool $override Whether to override the current first item class or not.
     *
     * @return static A new instance of the current class with the specified first item class.
     */
    public function firstItemClass(array|string $value, bool $override = true): static
    {
        $new = clone $this;
        $new->firstItemClass = $value;
        $new->overrideFirstItemClass = $override;

        return $new;
    }
}
