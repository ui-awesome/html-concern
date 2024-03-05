<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern;

use UIAwesome\Html\{Helper\CssClass, Helper\Sanitize, Interop\RenderInterface};

/**
 * Is used by widgets that implement the prefix collection.
 */
trait HasPrefixCollection
{
    protected string $prefix = '';
    protected array $prefixAttributes = [];
    protected false|string $prefixTag = false;

    /**
     * Set the `HTML` prefix content.
     *
     * @param RenderInterface|string ...$values The `HTML` prefix content.
     *
     * @return static A new instance of the current class with the specified prefix content.
     */
    public function prefix(string|RenderInterface ...$values): static
    {
        $new = clone $this;
        $new->prefix = Sanitize::html(...$values);

        return $new;
    }

    /**
     * Set the `HTML` attributes for the prefix tag.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified prefix attributes.
     */
    public function prefixAttributes(array $values): static
    {
        $new = clone $this;
        $new->prefixAttributes = $values;

        return $new;
    }

    /**
     * Set the `CSS` class for the prefix tag.
     *
     * @param string $value The CSS class name.
     * @param bool $override If `true` the value will be overridden.
     *
     * @return static A new instance of the current class with the specified prefix class.
     */
    public function prefixClass(string $value, bool $override = false): static
    {
        $new = clone $this;
        CssClass::add($new->prefixAttributes, $value, $override);

        return $new;
    }

    /**
     * Set the prefix tag name.
     *
     * @param false|string $value The tag name for the prefix element.
     * If `false` the prefix tag will be disabled.
     *
     * @throws \InvalidArgumentException If the prefix tag is an empty string.
     *
     * @return static A new instance of the current class with the specified prefix tag.
     * If `false` the prefix tag will be disabled.
     */
    public function prefixTag(false|string $value = 'div'): static
    {
        if ($value === '') {
            throw new \InvalidArgumentException('The prefix tag must be a non-empty string.');
        }

        $new = clone $this;
        $new->prefixTag = $value;

        return $new;
    }
}
