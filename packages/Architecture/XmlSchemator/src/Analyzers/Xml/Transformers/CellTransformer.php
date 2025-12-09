<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Transformers;

use App\Containers\Sat\Cfdi\Enums\V40\ComprobanteEnum;
use Illuminate\Support\Arr;
use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Transformers\Transformer;

class CellTransformer implements Transformer
{
    public function __construct(
        // protected string $className,
        // protected ?string $setTimeZone = null
    ) {
    }

    public function transform(DataProperty $property, mixed $value): array
    {
        $attributeName = $property->className::TYPE;
        // dd($property, $property->className::TYPE, $value);
        // row
        // column
        // cell value
        // original value
        // function  (formula)
        // background color
        // cell type
        // format definition string (General)
        // type: n (integer)
        $column = $attributeName->cellColumnIndex();
        // $backgroundColor = $attributeName->cellBakgroundColor();

        return [
            'r' => null,
            'c' => $column,
            'v' => [
                'v'  => $value,
                'f'  => null,
                // 'bg' => $backgroundColor,
                'ct' => [
                    'fa' => 'General',
                    't' => 'n'
                ],
            ]
        ];
        // [$format] = Arr::wrap($this->format ?? config('data.date_format'));

        // /** @var \DateTimeInterface $value */
        // if ($this->setTimeZone) {
        //     $value = (clone $value)->setTimezone(new DateTimeZone($this->setTimeZone));
        // }

        // return $value->format(ltrim($format, '!'));
    }
}
