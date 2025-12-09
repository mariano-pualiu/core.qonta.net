<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Arr;

/**
 * Specifies the upper bounds for numeric values (the value must be less than or equal to this value)
 */
class NamespaceRule implements Rule
{
    protected static array $supportedNamespaces = [
        'http://www.w3.org/2000/xmlns/' => [
            'http://www.sat.gob.mx/cfd/4'               => 'cfdi',
            'http://www.sat.gob.mx/cfd/3'               => 'cfdi',
            'http://www.sat.gob.mx/nomina12'            => 'nomina12',
            'http://www.sat.gob.mx/TimbreFiscalDigital' => 'tfd',
            'http://www.w3.org/2001/XMLSchema-instance' => 'xsi',
        ]
    ];

    const NAMESPACE_CONTEXTS = [
        'cfdi' => [
            'http://www.sat.gob.mx/cfd/4',
            'http://www.sat.gob.mx/cfd/3',
        ],
        'nomina12' => [
            'http://www.sat.gob.mx/nomina12',
        ],
        'tfd' => [
            'http://www.sat.gob.mx/TimbreFiscalDigital',
        ],
        'xsi' => [
            'http://www.w3.org/2001/XMLSchema-instance',
        ],
    ];

    protected string $context;
    protected string $value;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $context)
    {
        $this->context = $context;
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

        return in_array($value, Arr::get(Self::NAMESPACE_CONTEXTS, $this->context));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "El valor '{$this->value}' del `namespace` para el contexto: {$this->context}, no esta incluye en los contextos validos para el comprobante.";
    }
}
