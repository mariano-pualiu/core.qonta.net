<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Specifies the minimum number of characters or list items allowed. Must be equal to or greater than zero
 */
class MinLengthRule implements Rule
{
    protected int $minLength;
    protected string $value;
    protected int $valueLength;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(int $minLength)
    {
        $this->minLength = $minLength;
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

        return $this->valueLength >= $this->minLength;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "La longitud ({$this->valueLength}) del valor: '{$this->value}', es menor a la longitud ({$this->length}) minima, para el attributo: :attribute.";
    }
}
