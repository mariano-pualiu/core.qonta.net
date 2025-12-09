<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Defines the exact sequence of characters that are acceptable
 */
class PatternRule implements Rule
{
    protected string $pattern;

    protected string $value;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $pattern)
    {
        $this->pattern = $pattern;
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

        return preg_match("\"{$this->pattern}\"", $value) === 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "El valor: '{$this->value}', no es compatible con la expresión regular '{$this->pattern}', para el attributo: :attribute.";
    }
}
