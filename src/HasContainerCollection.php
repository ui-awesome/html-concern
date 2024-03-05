<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern;

use UIAwesome\Html\Helper\CssClass;

/**
 * Is used by widgets that implement container methods.
 */
trait HasContainerCollection
{
    protected array $containerAttributes = [];
    protected false|string $containerTag = false;

    /**
     * Set the `HTML` attributes for the container.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified container attributes.
     */
    public function containerAttributes(array $values = []): static
    {
        $new = clone $this;
        $new->containerAttributes = $values;

        return $new;
    }

    /**
     * Set the `CSS` class for the container.
     *
     * @param string $value The CSS class name.
     * @param bool $override If `true` the value will be overridden.
     *
     * @return static A new instance of the current class with the specified container class.
     */
    public function containerClass(string $value, bool $override = false): static
    {
        $new = clone $this;
        CssClass::add($new->containerAttributes, $value, $override);

        return $new;
    }

    /**
     * Set the container tag name.
     *
     * @param false|string $value The tag name for the container element.
     * If `false` the container tag will be disabled.
     *
     * @throws \InvalidArgumentException If the container tag is an empty string.
     *
     * @return static A new instance of the current class with the specified container tag.
     * If `false` the container tag will be disabled.
     */
    public function containerTag(false|string $value = 'div'): static
    {
        if ($value === '') {
            throw new \InvalidArgumentException('The container tag must be a non-empty string.');
        }

        $new = clone $this;
        $new->containerTag = $value;

        return $new;
    }
}
