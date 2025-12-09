<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Specifies the exact number of characters or list items allowed. Must be equal to or greater than zero
 */
class LengthRule implements Rule
{
    protected int $length;
    protected int $valueLength;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(int $length)
    {
        $this->length = $length;
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

        $this->valueLength = strlen($value);

        return $this->valueLength == $this->length;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "La longitud ({$this->valueLength}) del valor: '{$this->value}', no es exactamente igual con la longitud ({$this->length}) esperada, para el attributo: :attribute.";
    }
}
