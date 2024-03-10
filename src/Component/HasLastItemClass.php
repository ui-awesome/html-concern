<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Component;

/**
 * Is used by widgets that implement the last item class method.
 */
trait HasLastItemClass
{
    protected array|string $lastItemClass = '';
    protected bool $overrideLastItemClass = true;

    /**
     * Sets the last item class.
     *
     * @param array|string $value The `CSS` class that will be assigned to the last item.
     * @param bool $override Whether to override the current last item class or not.
     *
     * @return static A new instance of the current class with the specified last item class.
     */
    public function lastItemClass(array|string $value, bool $override = true): static
    {
        $new = clone $this;
        $new->lastItemClass = $value;
        $new->overrideLastItemClass = $override;

        return $new;
    }
}
