<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern;

use UIAwesome\Html\{Helper\CssClass, Helper\Sanitize, Interop\RenderInterface};

/**
 * Is used by widgets that implement the suffix collection.
 */
trait HasSuffixCollection
{
    protected string $suffix = '';
    protected array $suffixAttributes = [];
    protected false|string $suffixTag = false;

    /**
     * Set the `HTML` suffix content.
     *
     * @param RenderInterface|string ...$values The `HTML` suffix content.
     *
     * @return static A new instance of the current class with the specified suffix content.
     */
    public function suffix(string|RenderInterface ...$values): static
    {
        $new = clone $this;
        $new->suffix = Sanitize::html(...$values);

        return $new;
    }

    /**
     * Set the `HTML` attributes for the suffix.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified suffix attributes.
     */
    public function suffixAttributes(array $values): static
    {
        $new = clone $this;
        $new->suffixAttributes = $values;

        return $new;
    }

    /**
     * Set the `CSS` class for the suffix tag.
     *
     * @param string $value The CSS class name.
     * @param bool $override If `true` the value will be overridden.
     *
     * @return static A new instance of the current class with the specified suffix class.
     */
    public function suffixClass(string $value, bool $override = false): static
    {
        $new = clone $this;
        CssClass::add($new->suffixAttributes, $value, $override);

        return $new;
    }

    /**
     * Set the suffix tag name.
     *
     * @param false|string $value The tag name for the suffix element.
     * If `false` the suffix tag will be disabled.
     *
     * @throws \InvalidArgumentException If the suffix tag is an empty string.
     *
     * @return static A new instance of the current class with the specified suffix tag.
     * If `false` the suffix tag will be disabled.
     */
    public function suffixTag(false|string $value = 'div'): static
    {
        if ($value === '') {
            throw new \InvalidArgumentException('The suffix tag must be a non-empty string.');
        }

        $new = clone $this;
        $new->suffixTag = $value;

        return $new;
    }
}
