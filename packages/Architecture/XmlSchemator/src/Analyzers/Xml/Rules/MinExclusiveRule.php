<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Specifies the lower bounds for numeric values (the value must be greater than this value)
 */
class MinExclusiveRule implements Rule
{
    protected int $minExclusiveValue;
    protected string $value;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(int $minExclusiveValue)
    {
        $this->minExclusiveValue = $minExclusiveValue;
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

        return $this->value > $this->minExclusiveValue;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "El valor {$this->value}, no alcanza al valor exclusivo minimo ({$this->minExclusiveValue}) para el attributo: :attribute.";
    }
}
