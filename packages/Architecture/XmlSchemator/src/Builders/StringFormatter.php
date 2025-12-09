<?php

namespace Architecture\XmlSchemator\Builders;

use Architecture\XmlSchemator\Builders\Enums\StringFormatEnum;
use Architecture\XmlSchemator\Builders\Traits;
use Architecture\XmlSchemator\Parents\Builders\SimpleBuilder;
use Architecture\XmlSchemator\Presenter\Contracts\Presentable;
use Architecture\XmlSchemator\Presenter\Presenters\FormatsPropertyPresenter;
use Architecture\XmlSchemator\Presenter\Traits\HasPresenter;
use Artisan;

class StringFormatter extends SimpleBuilder implements Presentable
{
    use HasPresenter, Traits\SetsStringValue;

    public function __construct($stringValue)
    {
        parent::__construct();

        $this->setParamValue($stringValue);
    }

    # Presenter

    protected $presenter = FormatsPropertyPresenter::class;

    # Formatter

    public function asFormat(
        StringFormatEnum|string $formatName = StringFormatEnum::STRING_ORIGINAL,
        bool $removeSpecialChars = true
    )
    {
        $formatName = is_string($formatName) ? StringFormatEnum::tryFrom($formatName) : $formatName;

        return match ($formatName) {
            StringFormatEnum::STRING_LOWER_FORMAT  => $this->present()->asLowerFormat('stringValue', $removeSpecialChars),
            StringFormatEnum::STRING_UPPER_FORMAT  => $this->present()->asUpperFormat('stringValue', $removeSpecialChars),
            StringFormatEnum::STRING_SNAKE_FORMAT  => $this->present()->asSnakeFormat('stringValue', $removeSpecialChars),
            StringFormatEnum::STRING_KEBAB_FORMAT  => $this->present()->asKebabFormat('stringValue', $removeSpecialChars),
            StringFormatEnum::STRING_STUDLY_FORMAT => $this->present()->asStudlyFormat('stringValue', $removeSpecialChars),
            StringFormatEnum::STRING_TITLE_FORMAT  => $this->present()->asTitleFormat('stringValue', $removeSpecialChars),
            StringFormatEnum::STRING_ORIGINAL      => $this->present()->asOriginalFormat('stringValue', false),
            StringFormatEnum::STRING_ARRAY         => $this->present()->fromJsonFormat(true),
            StringFormatEnum::STRING_OBJECT        => $this->present()->fromJsonFormat(false),
            // StringFormatEnum::STRING_JSON       => ,
            default                                => $this->present()->asOriginalFormat('stringValue', $removeSpecialChars),
        };
    }
}
