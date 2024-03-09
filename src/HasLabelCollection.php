<?php

declare(strict_types=1);

namespace UIAwesome\Html\Concern;

use UIAwesome\Html\{Helper\CssClass, Helper\Sanitize, Interop\RenderInterface};

use function array_merge;

/**
 * Is used by widgets that implement the label collection class.
 */
trait HasLabelCollection
{
    protected bool $disableLabel = false;
    protected string $label = '';
    protected array $labelAttributes = [];
    protected string $labelClass = '';
    protected string|null $labelFor = null;

    /**
     * Disable the label.
     *
     * @return static A new instance or clone of the current object with the label disabled.
     */
    public function disableLabel(): static
    {
        $new = clone $this;
        $new->disableLabel = true;

        return $new;
    }

    /**
     * Get the `HTML` attributes for the label.
     *
     * @return array Attribute values indexed by attribute names.
     */
    public function getLabelAttributes(): array
    {
        return $this->labelAttributes;
    }

    /**
     * Set the `HTML` label content.
     *
     * @param RenderInterface|string ...$values The `HTML` label content value.
     *
     * @return static A new instance of the current class with the specified `HTML` label content.
     */
    public function label(RenderInterface|string ...$values): static
    {
        $new = clone $this;
        $new->label = Sanitize::html(...$values);

        return $new;
    }

    /**
     * Set the `HTML` attributes for the label.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static A new instance of the current class with the specified label attributes.
     */
    public function labelAttributes(array $values): static
    {
        $new = clone $this;
        $new->labelAttributes = array_merge($new->labelAttributes, $values);

        return $new;
    }

    /**
     * Set the `CSS` class for the label.
     *
     * @param string $value The value of the class attribute.
     * @param bool $override If `true` the value will be overridden.
     *
     * @return static A new instance of the current class with the specified label class.
     */
    public function labelClass(string $value, bool $override = false): static
    {
        $new = clone $this;
        CssClass::add($new->labelAttributes, $value, $override);

        return $new;
    }

    /**
     * Set the `for` attribute for the label.
     *
     * @param string|null $value The value for the `for` attribute.
     *
     * @return static A new instance of the current class with the specified label `for` attribute.
     */
    public function labelFor(string|null $value): static
    {
        $new = clone $this;
        $new->labelFor = $value;

        return $new;
    }
}
