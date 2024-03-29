<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern;

/**
 * Is used by widgets that implement the separator method.
 */
trait HasSeparator
{
    protected string $separator = '';

    /**
     * Set the separator.
     *
     * @param string $value The separator of the widget.
     *
     * @return static A new instance of the current class with the specified separator.
     */
    public function separator(string $value): static
    {
        $new = clone $this;
        $new->separator = $value;

        return $new;
    }
}
