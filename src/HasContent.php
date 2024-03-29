<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern;

use UIAwesome\Html\{Helper\Sanitize, Interop\RenderInterface};

/**
 * Is used by widgets that implement the content method.
 */
trait HasContent
{
    protected string $content = '';

    /**
     * Set the `HTML` content value.
     *
     * @param RenderInterface|string ...$values The `HTML` content value.
     *
     * @return static A new instance of the current class with the specified content value.
     */
    public function content(string|RenderInterface ...$values): static
    {
        $new = clone $this;
        $new->content = Sanitize::html(...$values);

        return $new;
    }

    /**
     * Get the `HTML` content value.
     *
     * @return string The `HTML` content value.
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
