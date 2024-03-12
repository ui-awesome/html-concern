<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern\Component;

/**
 * Is used by widgets that implement the link area current attribute.
 */
trait HasLinkAreaCurrent
{
    protected bool $linkAriaCurrent = false;

    /**
     * Set the link aria current attribute.
     */
    public function linkAriaCurrent(): static
    {
        $new = clone $this;
        $new->linkAriaCurrent = true;

        return $new;
    }

    /**
     * Check if the link aria current attribute is `true` or `false`.
     */
    public function isLinkAriaCurrent(): bool
    {
        return $this->linkAriaCurrent;
    }
}
