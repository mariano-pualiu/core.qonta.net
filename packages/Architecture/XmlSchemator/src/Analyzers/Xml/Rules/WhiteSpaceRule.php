<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\WhiteSpaceEnum;
use Illuminate\Contracts\Validation\Rule;

/**
 * Specifies how white space (line feeds, tabs, spaces, and carriage returns) is handled
 */
class WhiteSpaceRule implements Rule
{
    protected WhiteSpaceEnum $operation;

    protected string $value;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $operation)
    {
        $this->operation = WhiteSpaceEnum::from($operation);
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
        $this->value = match ($this->operation) {
            WhiteSpaceEnum::COLLAPSE => trim($value),
            default => $this->value,
        };

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
