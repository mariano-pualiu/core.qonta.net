<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Commands;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Types\CatCFDIEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Types\CatNominaEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Types\TdCFDIEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\BaseEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\OccursEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\Attributes\Values\UseEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Enums\RestrictionsEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Helpers\NamespaceBuilder;
use Architecture\XmlSchemator\Parents\Commands\GeneratorCommand;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class RestrictionEnumsGenerator extends GeneratorCommand
{
    const FILE_TYPE     = 'RestrictionsEnum';
    const SHORT_INDENT  = '    ';
    const LONG_INDENT   = '        ';

    // const ROOT = 'app/Ship/Analyzers/Xml';

    /**
     * User required/optional inputs expected to be passed while calling the command.
     * This is a replacement of the `getArguments` function "which reads whenever it's called".
     *
     * @var  array
     */

    public $inputs = [
        ['model', null, InputOption::VALUE_REQUIRED, 'The name of the Model'],
        ['collection', null, InputOption::VALUE_REQUIRED, 'The name of the Collection'],
        ['parent', null, InputOption::VALUE_REQUIRED, 'The parent element for the value to be aware of'],

        ['class-namespace-path', null, InputOption::VALUE_REQUIRED, 'The sub-namespace under the value will be asigned'],
        ['xsd-version-number', null, InputOption::VALUE_REQUIRED, 'The simple container alias name, such as cfd, nomina, pagos, etc.'],
        ['attributes', null, InputOption::VALUE_REQUIRED, 'The attributes list for the value to be aware of'],
    ];

    /**
     * The console command name.
     *
     * @var string
     */
    // protected $name = 'core:generate:value:node:restrictions';
    protected $name = 'core:xml:generate:enum:node:attributes';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the new Element Node Value class';
    /**
     * The type of class being generated.
     */
    protected string $fileType = 'ElementNodeValue';
    /**
     * The structure of the file path.
     */
    // protected string $pathStructure = '{section-name}/{container-name}/Data/Enums/Xml/Attributes/Types/*';
    protected string $pathStructure = '{SectionName}/{ContainerName}/Enums/{VersionNumber}/{PathFolder}/*';
    /**
     * The structure of the file name.
     */
    protected string $nameStructure = '{FileName}';
    /**
     * The name of the stub file.
     */
    protected string $stubName = 'enums/element_attributes_enum.stub';

    /**
     * @void
     *
     * @throws GeneratorErrorException|FileNotFoundException
     */
    public function handle()
    {
        parent::handle();

        $this->printInfoMessage('Generating Restriction Enums');

        $this->promptContextInput('class-namespace-path', 'The namespace value to be placed in');
        $this->promptContextInput('xsd-version-number', 'The XSD namespace alias value');
        $this->promptContextInput('attributes', 'The attributes list for the value to be aware of, json format');

        $this->promptContextInput('model', 'Enter the name of the Model');
        $this->promptContextInput('collection', 'Enter the name of the Collection');
        $this->promptContextInput('parent', 'The parent element for the value to be aware of, json format');

        // $subNamespace = Str::of($this->contextInput['namespace']->present()->fromJsonFormat(true));
        $subNamespace = Str::of($this->contextInput['class-namespace-path']->stringValue->value)->beforeLast('/');
        // dd($subNamespace, (string) Str::after($subNamespace, '\\'));

        $attributes = collect($this->contextInput['attributes']->present()->fromJsonFormat(true));
        $typeEnum = $this->contextInput->get('model')->present()->asStudlyFormat();
        // dump($attributes);
        $this->longestCaseExpression = 1 + $attributes
            // ->max(fn ($attributeFields, $attributeName) => strlen("{$typeEnum}::{$attributeName}"));
            ->reduce(fn ($carry, $attributeFields, $attributeName) => max($carry, strlen("{$typeEnum}::{$attributeName}")));

        $enumRestrictionsCases = $this->prepareRestrictionCases();
        $enumRestrictionsAnnotations = $this->prepareRestrictionAnnotations();
        $enumRestrictionsBasesAndTypes = $this->prepareRestrictionBasesAndTypes();
        $enumRestrictionsRules = $this->prepareRestrictionRules();
        $enumName = $this->contextInput->get('model')->present()->asStudlyFormat();

        $parent = $this->contextInput['parent']->present()->fromJsonFormat(true);

        $this->baseNamespace = new NamespaceBuilder(
            section: $this->contextInput->get('section')->present()->asStudlyFormat(),
            container: $this->contextInput->get('container')->present()->asStudlyFormat(),
            context: 'Enums',
            version: $this->contextInput->get('xsd-version-number')->present()->asStudlyFormat(),
            path: Str::of(Arr::get($parent, 'classNamespacePath'))->replace('/', '\\')
        );

        // $this->baseNamespace->dump();
        // dump($this->baseNamespace->getFullyQualifiedClassName());

        // dd([
        //     'subNamespace' => $subNamespace,
        //     'SubNamespace' => Str::of($subNamespace)->replace('/', '\\'),
        // ]);

        $generatorParams = [

            'path-parameters' => [
                'SectionName'          => $this->contextInput->get('section')->present()->asStudlyFormat(),
                'ContainerName'        => $this->contextInput->get('container')->present()->asStudlyFormat(),
                'VersionNumber'        => $this->contextInput->get('xsd-version-number')->present()->asStudlyFormat(),
                'PathFolder'           => (string) $subNamespace->after('/'),
            ],
            'stub-parameters' => [
                'BaseNamespace'        => $this->baseNamespace->getFullyQualifiedClassName(),
                'EnumName'             => $enumName,
                'enum:cases'           => $enumRestrictionsCases,
                'enum:annotations'     => $enumRestrictionsAnnotations,
                'enum:bases-and-types' => $enumRestrictionsBasesAndTypes,
                'enum:rules'           => $enumRestrictionsRules,
            ],
            'file-parameters' => [
                'FileName'             => $enumName,
            ],
        ];

        $this->fileType = Static::FILE_TYPE . " ({$enumName}) ";

        // dd($generatorParams);

        $this->generateFiles($generatorParams);
    }

    protected function prepareRestrictionCases()
    {
        // $attributesJson = Arr::get($this->contextInput, 'attributes.name');
        $attributes = collect($this->contextInput['attributes']->present()->fromJsonFormat(true));
        // dd($this->contextInput, $this->contextInput['attributes'], $this->contextInput['attributes']->present()->fromJsonFormat(true));
        return (string) $attributes
            ->keys()
            ->map(function ($attributeName) {
                // case Version              = 'Version';
                // return "case {$attributeName}   = '{$attributeName}';";
                return (string) Str::of("case {$attributeName}")
                    ->padRight($this->longestCaseExpression, ' ')
                    ->finish("= '{$attributeName}';");
            })
            ->implodeToStr(PHP_EOL . Self::SHORT_INDENT)
                ->start(PHP_EOL . Self::SHORT_INDENT);
            // ->mapWithKeys(function ($attributeFields, $attributeName) {
            //     $propertyName = Str::studly($attributeName);
            //     $pathName = (string) Str::of(Arr::get($attributeFields, 'namespace'))->beforeLast('\\Attributes');
            //     $restrictions = Arr::get($attributeFields, 'restrictions');
            //     return [$pathName => $restrictions];
            // });
    }

    protected function prepareRestrictionAnnotations()
    {
        $attributes = collect($this->contextInput['attributes']->present()->fromJsonFormat(true));

        $typeEnum = $this->contextInput->get('model')->present()->asStudlyFormat();

        return (string) $attributes
            ->map(function ($attributeFields, $attributeName) use ($typeEnum) {
                $annotation = Arr::get($attributeFields, 'annotation');
                return (string) Str::of("{$typeEnum}::{$attributeName}")
                    ->padRight($this->longestCaseExpression, ' ')
                    ->finish("=> '{$annotation}',");
            })
            ->implodeToStr(PHP_EOL . Self::SHORT_INDENT . Self::LONG_INDENT);
    }

    protected function prepareRestrictionBasesAndTypes()
    {
        $attributes = collect($this->contextInput['attributes']->present()->fromJsonFormat(true));

        $typeEnum = $this->contextInput->get('model')->present()->asStudlyFormat();

        return $attributes
            ->map(function ($attributeFields, $attributeName) use ($typeEnum) {
                $baseOrType = Arr::get($attributeFields, 'base') ?? Arr::get($attributeFields, 'attributes.type') ?? BaseEnum::XS_STRING->value;
                // $baseOrType == 'catNomina:c_TipoContrato' ? dd(CatNominaEnum::tryFrom($baseOrType)) : null;
                $prefix = (string) Str::of($baseOrType)->before(':');

                return (string) Str::of("{$typeEnum}::{$attributeName}")
                    ->padRight($this->longestCaseExpression, ' ')
                    ->finish('=> ')
                    . match ($prefix) {
                        'xs' => 'BaseEnum::' . BaseEnum::tryFrom($baseOrType)?->name . ',',
                        'tdCFDI' => 'Types\TdCFDIEnum::' . TdCFDIEnum::tryFrom($baseOrType)?->name . '->base(),',
                        'catCFDI' => 'Types\CatCFDIEnum::' . CatCFDIEnum::tryFrom($baseOrType)?->name . '->base(),',
                        'catNomina' => 'Types\CatNominaEnum::' . CatNominaEnum::tryFrom($baseOrType)?->name . '->base(),',
                        default => null,
                    };
            })
            ->implodeToStr(PHP_EOL . Self::SHORT_INDENT . Self::LONG_INDENT);
    }

    protected function prepareRestrictionRules()
    {
        $attributes = collect($this->contextInput['attributes']->present()->fromJsonFormat(true));
        // dd($attributes);
        $typeEnum = $this->contextInput->get('model')->present()->asStudlyFormat();

        return (string) $attributes
            ->map(function ($attributeFields, $attributeName) use ($typeEnum) {
                $baseOrType = Arr::get($attributeFields, 'base') ?? Arr::get($attributeFields, 'attributes.type') ?? BaseEnum::XS_STRING->value;
                // dump();
                $prefix = (string) Str::of($baseOrType)->before(':');
                // dump([$prefix => $baseOrType]);

                $restrictions = collect(Arr::get($attributeFields, 'restrictions'));
                // TypeEnum::Version               => [
                // TypeEnum::Fecha                 => TdCFDIEnum::T_FechaH->restrictionRules(),
                return (string) Str::of("{$typeEnum}::{$attributeName}")
                    ->padRight($this->longestCaseExpression, ' ')
                    ->finish("=> ") .
                    match ($prefix) {
                        'xs' => (string) $restrictions->map(function ($restrictionValue, $restrictionName) {
                            $restrictionType = RestrictionsEnum::tryFrom((string) Str::of($restrictionName)->start('xs:'));

                            return match ($restrictionType) {
                                RestrictionsEnum::XS_ENUMERATION        => "Rules\EnumerationRule::class => new Rules\EnumerationRule(['{$restrictionValue}']),",
                                RestrictionsEnum::XS_FRACTION_DIGITS    => "Rules\FractionDigitsRule::class => new Rules\FractionDigitsRule('{$restrictionValue}'),",
                                RestrictionsEnum::XS_LENGTH             => "Rules\LengthRule::class => new Rules\LengthRule('{$restrictionValue}'),",
                                RestrictionsEnum::XS_MAX_EXCLUSIVE      => "Rules\MaxExclusiveRule::class => new Rules\MaxExclusiveRule('{$restrictionValue}'),",
                                RestrictionsEnum::XS_MAX_INCLUSIVE      => "Rules\MaxInclusiveRule::class => new Rules\MaxInclusiveRule('{$restrictionValue}'),",
                                RestrictionsEnum::XS_MAX_LENGTH         => "Rules\MaxLengthRule::class => new Rules\MaxLengthRule('{$restrictionValue}'),",
                                RestrictionsEnum::XS_MIN_EXCLUSIVE      => "Rules\MinExclusiveRule::class => new Rules\MinExclusiveRule('{$restrictionValue}'),",
                                RestrictionsEnum::XS_MIN_INCLUSIVE      => "Rules\MinInclusiveRule::class => new Rules\MinInclusiveRule('{$restrictionValue}'),",
                                RestrictionsEnum::XS_MIN_LENGTH         => "Rules\MinLengthRule::class => new Rules\MinLengthRule('{$restrictionValue}'),",
                                RestrictionsEnum::XS_PATTERN            => "Rules\PatternRule::class => new Rules\PatternRule('{$restrictionValue}'),",
                                RestrictionsEnum::XS_TOTAL_DIGITS       => "Rules\TotalDigitsRule::class => new Rules\TotalDigitsRule('{$restrictionValue}'),",
                                RestrictionsEnum::XS_WHITE_SPACE        => "Rules\WhiteSpaceRule::class => new Rules\WhiteSpaceRule('{$restrictionValue}'),",
                                default => null,
                            };
                        })->implodeToStr(PHP_EOL . Self::LONG_INDENT . Self::LONG_INDENT)
                            ->start('[' . PHP_EOL . Self::LONG_INDENT . Self::LONG_INDENT)
                            ->finish(PHP_EOL . Self::LONG_INDENT . Self::SHORT_INDENT . '],'),
                        'tdCFDI' => "Types\TdCFDIEnum::" . TdCFDIEnum::tryFrom($baseOrType)?->name . "->restrictionRules(),",
                        'catCFDI' => "Types\CatCFDIEnum::" . CatCFDIEnum::tryFrom($baseOrType)?->name . "->restrictionRules(),",
                        'catNomina' => 'Types\CatNominaEnum::' . CatNominaEnum::tryFrom($baseOrType)?->name . '->restrictionRules(),',
                        default => null,
                    } ;
            })
            ->implodeToStr(PHP_EOL . Self::SHORT_INDENT . Self::LONG_INDENT);
    }
}
