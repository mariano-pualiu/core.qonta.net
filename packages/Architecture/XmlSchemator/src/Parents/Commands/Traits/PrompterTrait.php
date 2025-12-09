<?php

namespace Architecture\XmlSchemator\Parents\Commands\Traits;

use Architecture\XmlSchemator\Builders\StringFormatter;

trait PrompterTrait
{
    protected function promptContextInput(
        string $context,
        string $promptMessage = 'Enter the name of the context',
        string $defaultValue = null
    )
    {
        $contextName = $this->checkParameterOrAsk($context, $promptMessage, $defaultValue);
        // dump([$context => $contextName]);
        $this->contextInput->put($context, new StringFormatter($contextName ?? ''));
    }

    protected function promptConfirmParameter(
        string $context,
        string $promptMessage = 'Do you want to confirm the following operation?',
        bool $confirmationDefault = true
    )
    {
        $confirmation = ucfirst($this->checkParameterOrConfirm($context, $promptMessage, $confirmationDefault));

        $this->contextInput->put($context, $confirmation);
    }

    protected function promptFileNameInput(
        string $fileType,
        string $defaultValue = null,
        string $promptMessage = null,
        bool $removeSpecialChars = true
    )
    {
        $fileName = ucfirst($this->checkParameterOrAsk('file', $promptMessage ?? 'Enter the name of the ' . $fileType . ' file', $defaultValue));

        // $fileName = $removeSpecialChars ? $this->removeSpecialChars($fileName) : $fileName;

        $this->contextInput->put('file', new StringFormatter($fileName));
    }

    protected function promptContextOption(
        string $context,
        string $promptMessage = 'Select a context option',
        array $optionValues = [],
        int $defaultValue = 0
    )
    {
        $contextName = $this->checkParameterOrChoice($context, $promptMessage, $optionValues);

        $this->contextInput->put($context, new StringFormatter($contextName));
    }
}
