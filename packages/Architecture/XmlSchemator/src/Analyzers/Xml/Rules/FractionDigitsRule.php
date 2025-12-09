<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Specifies the maximum number of decimal places allowed. Must be equal to or greater than zero
 */
class FractionDigitsRule implements Rule
{
    protected int $numberOfDigits;
    protected int $valueLength;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(int $numberOfDigits)
    {
        $this->numberOfDigits = $numberOfDigits;
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

        $this->fractionPeriodPosition = strrchr($this->value, '.');

        $this->fractionDigitsLength = strlen(substr($this->fractionPeriodPosition, 1));

        return !$this->fractionPeriodPosition ?: $this->fractionDigitsLength <= $this->numberOfDigits;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "El número de cifras decimales ({$this->fractionDigitsLength}) del valor: '{$this->value}', es mayor al número de cifras esperadas ({$this->numberOfDigits}), para el attributo: :attribute.";
    }
}
