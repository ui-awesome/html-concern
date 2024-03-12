<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern;

/**
 * Is used by widgets that implement the tag method.
 */
trait HasTag
{
    protected false|string $tag = false;

    /**
     * Set the tag of the element.
     *
     * @param false|string $value The tag name for the element.
     * If `false` the tag will be disabled.
     *
     * @throws \InvalidArgumentException If the container tag is an empty string.
     *
     * @return static A new instance of the current class with the specified tag.
     * If `false` the tag will be disabled.
     */
    public function tag(false|string $value): static
    {
        if ($value === '') {
            throw new \InvalidArgumentException('The tag cannot be an empty string.');
        }

        $new = clone $this;
        $new->tag = $value;

        return $new;
    }
}
