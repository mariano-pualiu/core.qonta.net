<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Values\Attributes;

use Architecture\XmlSchemator\Analyzers\Xml\Normalizers\StringValueNormalizer;
use Architecture\XmlSchemator\Analyzers\Xml\Rules\NamespaceRule;
use Architecture\XmlSchemator\Parents\Values\Data;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Normalizers\ArrayNormalizer;
use Spatie\LaravelData\Support\Validation\ValidationContext;

/**
 * "Espacio de nombres definidos para el comprobante del recibo."
 */
class NamespaceAttribute extends Data
{
    const NAMESPACE_URI = 'http://www.w3.org/2000/xmlns/';

    public function __construct(
        public string $uri,
        public string $name,
        public string $value,
    )
    {}

    public static function rules(ValidationContext $context) {
        $namespaceName = Arr::get($context->payload, 'name');

        return [
            'value' => [new NamespaceRule($namespaceName)],
        ];
    }
}
