<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Specifies the exact number of digits allowed. Must be greater than zero
 */
class TotalDigitsRule implements Rule
{
    protected string $totalDigits;

    protected string $value;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $totalDigits)
    {
        $this->totalDigits = $totalDigits;
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

        return is_numeric($value) && strlen($value) > $this->totalDigits;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "El valor: '{$this->value}', no es compatible con la expresión regular '{$this->totalDigits}', para el attributo: :attribute.";
    }
}
