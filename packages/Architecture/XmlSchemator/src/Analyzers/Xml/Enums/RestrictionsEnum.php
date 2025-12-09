<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Enums;

use Architecture\XmlSchemator\Analyzers\Xml\Rules;
use ArchTech\Enums\Options;
use Illuminate\Support\Str;

enum RestrictionsEnum: string
{
    use Options;

    case XS_ENUMERATION     = 'xs:enumeration';
    case XS_FRACTION_DIGITS = 'xs:fractionDigits';
    case XS_LENGTH          = 'xs:length';
    case XS_MAX_EXCLUSIVE   = 'xs:maxExclusive';
    case XS_MAX_INCLUSIVE   = 'xs:maxInclusive';
    case XS_MAX_LENGTH      = 'xs:maxLength';
    case XS_MIN_EXCLUSIVE   = 'xs:minExclusive';
    case XS_MIN_INCLUSIVE   = 'xs:minInclusive';
    case XS_MIN_LENGTH      = 'xs:minLength';
    case XS_PATTERN         = 'xs:pattern';
    case XS_TOTAL_DIGITS    = 'xs:totalDigits';
    case XS_WHITE_SPACE     = 'xs:whiteSpace';

    public function nodeName()
    {
        return Str::after($this->value, ':');
    }

    public function code(): string
    {
        return match($this)
        {
            RestrictionsEnum::ENUMERATION     => 'XML_ATTR_ENM_RUL',
            RestrictionsEnum::FRACTION_DIGITS => 'XML_ATTR_FRC_DGTS_RUL',
            RestrictionsEnum::LENGTH          => 'XML_ATTR_LNGT_RUL',
            RestrictionsEnum::MAX_EXCLUSIVE   => 'XML_ATTR_MX_EXCL_RUL',
            RestrictionsEnum::MAX_INCLUSIVE   => 'XML_ATTR_MX_INCL_RUL',
            RestrictionsEnum::MAX_LENGTH      => 'XML_ATTR_MX_LNGT_RUL',
            RestrictionsEnum::MIN_EXCLUSIVE   => 'XML_ATTR_MN_EXCL_RUL',
            RestrictionsEnum::MIN_INCLUSIVE   => 'XML_ATTR_MN_INCL_RUL',
            RestrictionsEnum::MIN_LENGTH      => 'XML_ATTR_MN_LNGT_RUL',
            RestrictionsEnum::PATTERN         => 'XML_ATTR_PTRN_RUL',
            RestrictionsEnum::TOTAL_DIGITS    => 'XML_ATTR_TTL_DGTS_RUL',
            RestrictionsEnum::WHITE_SPACE     => 'XML_ATTR_WHT_SPC_RUL',
        };
    }

    public function message(): string
    {
        return match($this)
        {
            RestrictionsEnum::ENUMERATION     => 'The value (:current_value) is not in the expected list of valid values (:expected_values)',
            RestrictionsEnum::FRACTION_DIGITS => 'The number of the fraction digits (:current_number_of_fraction_digits) is not the expected one (:expected_number_of_fraction_digits)',
            RestrictionsEnum::LENGTH          => 'The length of the string (:current_length) is not the expected one (:expected_length)',
            RestrictionsEnum::MAX_EXCLUSIVE   => 'The value (:current_value) can\'t be greater or equal to (:max_exclusive_value)',
            RestrictionsEnum::MAX_INCLUSIVE   => 'The value (:current_value) can\'t be greater than (:max_inclusive_value)',
            RestrictionsEnum::MAX_LENGTH      => 'The length (:current_max_length) of the string surpasses the maximum length of (:expected_max_length)',
            RestrictionsEnum::MIN_EXCLUSIVE   => 'The value (:current_value) can\'t be lower or equal to (:min_exclusive_value)',
            RestrictionsEnum::MIN_INCLUSIVE   => 'The value (:current_value) can\'t be lower than (:min_inclusive_value)',
            RestrictionsEnum::MIN_LENGTH      => 'The length (:current_min_length) of the string fall\'s short the minimum length of (:expected_min_length)',
            RestrictionsEnum::PATTERN         => 'The the value (:current_value) doesn\'t comply with the pattern expression (:pattern_expression)',
            RestrictionsEnum::TOTAL_DIGITS    => 'The number of digits (:current_number_of_digits) of the value (:current_value) is not the expected one (:expected_number_of_digits)',
            RestrictionsEnum::WHITE_SPACE     => 'The operation (:current_operation) for white spaces is not supported',
        };
    }

    public function ruleInstance($condition): string
    {
        return match($this)
        {
            RestrictionsEnum::ENUMERATION     => new Rules\EnumerationAttributeRule($condition),
            RestrictionsEnum::FRACTION_DIGITS => new Rules\FractionDigitsAttributeRule($condition),
            RestrictionsEnum::LENGTH          => new Rules\LengthAttributeRule($condition),
            RestrictionsEnum::MAX_EXCLUSIVE   => new Rules\MaxExclusiveAttributeRule($condition),
            RestrictionsEnum::MAX_INCLUSIVE   => new Rules\MaxInclusiveAttributeRule($condition),
            RestrictionsEnum::MAX_LENGTH      => new Rules\MaxLengthAttributeRule($condition),
            RestrictionsEnum::MIN_EXCLUSIVE   => new Rules\MinExclusiveAttributeRule($condition),
            RestrictionsEnum::MIN_INCLUSIVE   => new Rules\MinInclusiveAttributeRule($condition),
            RestrictionsEnum::MIN_LENGTH      => new Rules\MinLengthAttributeRule($condition),
            RestrictionsEnum::PATTERN         => new Rules\PatternAttributeRule($condition),
            RestrictionsEnum::TOTAL_DIGITS    => new Rules\TotalDigitsAttributeRule($condition),
            RestrictionsEnum::WHITE_SPACE     => new Rules\WhiteSpaceAttributeRule($condition),
        };
    }
}
