<?php

namespace Architecture\XmlSchemator\Builders\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

trait SetsStringValue
{
    /**
     * @var string
     */
    public Stringable $stringValue;

    /**
     * @stringValue string $stringValue
     *
     * @return $this
     */
    public function setParamValue(string $stringValue)
    {
        $this->stringValue = Str::of($stringValue);

        return $this;
    }
}
