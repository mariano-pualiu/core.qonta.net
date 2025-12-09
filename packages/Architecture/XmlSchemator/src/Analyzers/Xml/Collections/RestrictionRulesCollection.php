<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Collections;

use Architecture\XmlSchemator\Analyzers\Xml\Rules;
use Illuminate\Database\Eloquent\Collection;

class RestrictionRulesCollection extends Collection
{
    public function getLength(): int
    {
        return $this->firstInstanceOf(Rules\LengthAttributeRule::class)?->length;
    }

    public function getMaxLength(): int
    {
        return $this->firstInstanceOf(Rules\MaxLengthAttributeRule::class)?->maxLength;
    }

    public function getMinLength(): int
    {
        return $this->firstInstanceOf(Rules\MinLengthAttributeRule::class)?->minLength;
    }

    public function getMaxValue(): float
    {
        return $this->firstInstanceOf([
            Rules\MaxExclusiveAttributeRule::class,
            Rules\MaxInclusiveAttributeRule::class
        ])?->maxValue;
    }

    public function getMinValue(): float
    {
        return $this->firstInstanceOf([
            Rules\MinInclusiveAttributeRule::class,
            Rules\MinExclusiveAttributeRule::class
        ])?->minValue;
    }

    public function getTotalDigits(): int
    {
        return $this->firstInstanceOf(Rules\TotalDigitsAttributeRule::class)?->totalDigits;
    }

    public function getOptions(): array|string
    {
        return $this->firstInstanceOf(Rules\EnumerationAttributeRule::class)?->options;
    }

    public function getNumberOfDigits(): int
    {
        return $this->firstInstanceOf(Rules\FractionDigitsAttributeRule::class)?->numberOfDigits;
    }

    public function getPattern(): string
    {
        return $this->firstInstanceOf(Rules\PatternAttributeRule::class)?->pattern;
    }

    public function getOperation(): string
    {
        return $this->firstInstanceOf(Rules\WhiteSpaceAttributeRule::class)?->operation;
    }
}
