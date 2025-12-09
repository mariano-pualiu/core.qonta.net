<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Specifies the upper bounds for numeric values (the value must be less than this value)
 */
class MaxExclusiveRule implements Rule
{
    protected int $maxExclusiveValue;
    protected string $value;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(int $maxExclusiveValue)
    {
        $this->maxExclusiveValue = $maxExclusiveValue;
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

        return $this->value < $this->maxExclusiveValue;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "El valor {$this->value}, supera al valor exclusivo maximo ({$this->maxExclusiveValue}) para el attributo: :attribute.";
    }
}
