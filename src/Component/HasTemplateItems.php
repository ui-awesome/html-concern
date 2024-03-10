<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Component;

/**
 * Is used by widgets that implement the template items method.
 */
trait HasTemplateItems
{
    protected array $templateItems = [];

    /**
     * Set the template for the menu items.
     *
     * @param string $value The template for the menu items.
     *
     * @return static A new instance of the current class with the specified template for the menu items.
     */
    public function templateItems(string $value): static
    {
        $new = clone $this;
        $new->templateItems = $value;

        return $new;
    }
}
