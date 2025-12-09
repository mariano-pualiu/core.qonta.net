<?php

namespace Architecture\XmlSchemator\Presenter\Presenters;

use Architecture\XmlSchemator\Presenter\Presenter;
use Illuminate\Support\Str;

class FormatsPropertyPresenter extends Presenter
{
    public function asOriginalFormat(bool $removeSpecialChars = false, string $propertyName = 'stringValue')
    {
        return $this->accessOptionalProperty($propertyName, $removeSpecialChars);
    }

    public function asLowerFormat(bool $removeSpecialChars = false, string $propertyName = 'stringValue')
    {
        return $this->accessOptionalProperty($propertyName, $removeSpecialChars)->lower();
    }

    public function asUpperFormat(bool $removeSpecialChars = false, string $propertyName = 'stringValue')
    {
        return $this->accessOptionalProperty($propertyName, $removeSpecialChars)->upper();
    }

    public function asSnakeFormat(bool $removeSpecialChars = false, string $propertyName = 'stringValue')
    {
        return $this->accessOptionalProperty($propertyName, $removeSpecialChars)->snake();
    }

    public function asKebabFormat(bool $removeSpecialChars = false, string $propertyName = 'stringValue')
    {
        return $this->accessOptionalProperty($propertyName, $removeSpecialChars)->kebab();
    }

    public function asStudlyFormat(bool $removeSpecialChars = false, string $propertyName = 'stringValue')
    {
        return $this->accessOptionalProperty($propertyName, $removeSpecialChars)->studly();
    }

    public function asTitleFormat(bool $removeSpecialChars = false, string $propertyName = 'stringValue')
    {
        $stringResult = $this->accessOptionalProperty($propertyName)
            ->snake()
            ->replace('_', ' ');

        return ucwords($stringResult);
    }

    public function fromJsonFormat($asArray = false, string $propertyName = 'stringValue')
    {
        // dump((string)$this->accessOptionalProperty($propertyName, false), $asArray);
        return json_decode((string) $this->accessOptionalProperty($propertyName, false), $asArray);
    }

    protected function accessOptionalProperty(string $propertyName = 'stringValue', bool $removeSpecialChars = true)
    {
        return optional($this->$propertyName, fn () => Str::of($this->$propertyName))
            ->when($removeSpecialChars, fn ($string) => Str::of($this->removeSpecialChars($string)));
    }

    /**
     * Removes "special characters" from a string
     * @param $str
     * @return string
     */
    protected function removeSpecialChars(Str|string $stringValue): string
    {
        // remove everything that is NOT a character or digit
        return Str::of(preg_replace('/[^A-Za-z0-9]/', '', (string) $stringValue));
    }
}
