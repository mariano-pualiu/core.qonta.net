<?php

namespace Architecture\XmlSchemator\Values;

use App\Ship\Parents\Values\Value;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ApiBuilderDirectorData extends Value
{
    public ?array $containerConfig = [];

    public function __construct(
        public string $sectionName,
        public string $containerName,
        public string $versionNumber,
    )
    {
        $this->containerConfig = config("architecture-xmlSchemator.sections.{$sectionName}.{$containerName}.{$versionNumber}");
    }

    public function __get($property)
    {
        $propertyPath = Str::of($property)->replace('_', '.')->snake();

        return Arr::get($this->containerConfig, $propertyPath);
    }
}
