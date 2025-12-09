<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Defines a list of acceptable values
 */
class EnumerationRule implements Rule
{
    protected array $options;
    protected array|string $value;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(array|string $options = [])
    {
        $this->options = $options;
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

        return is_array($this->options)
            ? in_array($value, $this->options)
            : false ?? ''; // TODO:implement validation rules via Microservices API
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "El valor {$this->value}, no se encuentra entre las opciones validas para el attributo: :attribute.";
    }
}
