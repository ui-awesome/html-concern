<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern;

/**
 * Is used by widgets that implement the template method.
 */
trait HasTemplate
{
    protected string $template = '';

    /**
     * Set the template.
     *
     * @param string $value The template of the widget.
     *
     * @return static A new instance of the current class with the specified template.
     */
    public function template(string $value): static
    {
        $new = clone $this;
        $new->template = $value;

        return $new;
    }
}
