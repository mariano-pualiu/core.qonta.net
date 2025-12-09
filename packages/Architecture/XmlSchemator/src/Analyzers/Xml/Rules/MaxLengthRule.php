<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Specifies the maximum number of characters or list items allowed. Must be equal to or greater than zero
 */
class MaxLengthRule implements Rule
{
    protected int $maxLength;
    protected string $value;
    protected int $valueLength;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(int $maxLength)
    {
        $this->maxLength = $maxLength;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->value = $value;

        $this->valueLength = match (gettype($value)) {
            'string' => strlen($value),
            'array'  => count($value),
            default  => false,
        };

        return $this->valueLength <= $this->maxLength;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "La longitud ({$this->valueLength}) del valor: '{$this->value}', es mayor a la longitud ({$this->length}) maxima, para el attributo: :attribute.";
    }
}
