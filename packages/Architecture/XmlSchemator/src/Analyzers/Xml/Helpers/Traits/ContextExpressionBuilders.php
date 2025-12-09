<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Helpers\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

trait ContextExpressionBuilders
{
    // public function formatRelationshipNamespace(array $relationship)
    public function getModelClassFromNamespace(string $classNamespacePath)
    {
        // return Str::of(Arr::get($relationship, 'namespace'))->afterLast('/')->camel();
        return Str::of($classNamespacePath)->afterLast('/')->camel();
    }

    // public function getClassFullyQualifiedName(Stringable $classNamespace, string $classNamespacePath)
    // {
    //     // return $classNamespace->finish(Arr::get($relationship, 'namespace'))->replace('/', '\\')->finish('::class');
    //     return $classNamespace
    //         ->finish($classNamespacePath)
    //         ->replace('/', '\\')
    //         ->finish('::class');
    // }

    public function getContextNamespaceAsFolderPath(Stringable $classNamespacePath)
    {
        return $classNamespacePath
            ->beforeLast('/')
            ->after('/')
            ->snake()
            ->replace('/_', '/');
    }

    public function getContextSubNamespacePath(Stringable $classNamespacePath)
    {
        $classSubNamespacePath = $classNamespacePath
            ->when($classNamespacePath->endsWith('/'), fn ($classNamespacePath) => $classNamespacePath->beforeLast('/'))
            ->replace('/', '\\');

        return $classSubNamespacePath;
    }

    public function getContextNamespace(string $contextName)
    {
        $sectionName = $this->contextInput->get('section')->present()->asStudlyFormat();

        $containerName = $this->contextInput->get('container')->present()->asStudlyFormat();

        // "App\Containers\{SectionName}\{ContainerName}\{ContextName}"
        $classNamespace = Str::of($this->containerNamespace)
            // "App\Containers\Sat\{ContainerName}\{ContextName}"
            ->replaceLast('{SectionName}', $sectionName)
            // "App\Containers\Sat\Cfdi\(Values|Models|..)"
            ->replaceLast('{ContainerName}', $containerName)
            // "App\Containers\Sat\Cfdi\Models"
            ->replaceLast('{ContextName}', Str::of($contextName)->studly()/*->pluralStudly()->prepend('\\')*/);

        return $classNamespace;
    }

    public function getFullyQualifiedClassName(Stringable $classNamespace, string $classNamespacePath, string $versionPrefix = null)
    {
        $fullyQualifiedClassName = Str::of($classNamespacePath) // "/Comprobante/Emisor"
            ->replace('/', '\\')                                // "\Comprobante\Emisor"
            ->when(
                !empty($versionPrefix),
                fn ($fqcn) => $fqcn->prepend("\\" . Str::studly($versionPrefix))
            )                                                   // "App\Containers\Sat\Cfdi\Models\V40\Comprobante\Emisor"
            ->prepend($classNamespace);                         // "App\Containers\Sat\Cfdi\Models(\V40)\Comprobante\Emisor"

        return $fullyQualifiedClassName;
    }

    public function getFullyQualifiedClassConstant(Stringable $classNamespace, string $classNamespacePath, string $versionPrefix = null)
    {
        $fullyQualifiedClassConstant = $this->getFullyQualifiedClassName($classNamespace, $classNamespacePath, $versionPrefix)
            ->finish('::class');                                // "App\Containers\Sat\Cfdi\Models(\V40)\Comprobante\Emisor::class"

        return $fullyQualifiedClassConstant;
    }

    // public function getDbCollectionName()
    // {
    //     return collect([
    //         $this->contextInput->get('section')->present()->asSnakeFormat()->toString(),
    //         $this->contextInput->get('container')->present()->asSnakeFormat()->toString(),
    //         $this->contextInput->get('collection')->present()->asSnakeFormat()->toString(),
    //     ])
    //     ->implode('_');
    // }

    public function wrapAndPad(string $string, $wrapper = "'", $padLength = null, $padSymbol = ' ')
    {
        return str_pad("{$wrapper}{$string}{$wrapper}", $padLength, $padSymbol);
    }

    public function extractSegmentsFromFullyQualifiedNamespace(string $fqcn): Collection
    {
        $patternSegments = "/(?<root>App\\\\Containers)(\\\\(?<section>[A-Za-z0-9]+))?(\\\\(?<container>[A-Za-z0-9]+))?(\\\\(?<context>[A-Za-z0-9]+))?(\\\\(?<version>V[0-9]+))?(\\\\(?<element_path>[\S]*))?/";

        preg_match_all($patternSegments, $fqcn, $matches, PREG_SET_ORDER);
        // dump($fqcn, $matches);
        $segments = array_filter($matches[0], fn ($key) => !is_numeric($key), ARRAY_FILTER_USE_KEY);
        // dump($patternSegments, $fqcn, $matches, $segments);

        return collect($segments);
    }

    public function formatNamespaceSegmentsAsVersionedContextAlias(string $fqcn, $keysToFormatBy = [])
    {
        $versionedContextAlias = $this->extractSegmentsFromFullyQualifiedNamespace($fqcn)
            ->only($keysToFormatBy)
            ->sortBy(fn ($value, $key) => array_search($key, $keysToFormatBy))
            ->implode('');

        return Str::of($versionedContextAlias);
    }

    public function normalizeElementRelationships(array $relationships = []): collection
    {
        return collect(Arr::get($relationships, 'relationships'))->map(fn ($relationshipTypes) => array_map(fn ($relationship) => Arr::get($relationship, 0), $relationshipTypes));
    }
}
