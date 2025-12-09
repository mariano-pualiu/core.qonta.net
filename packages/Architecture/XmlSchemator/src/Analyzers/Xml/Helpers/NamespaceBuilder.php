<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use Spatie\LaravelData\Data;

final class NamespaceBuilder
{
    const CLASS_CONSTANT = '::class';
    const PATH_SEPARATOR = '\\';
    const DEFAULT_ROOT = 'App\\Containers';
    const FULL_NAMESPACE_FORMAT = '{root}\\{section}\\{container}\\{context}\\{version}\\{path}\\{class}';
    const CONTEXT_NAMESPACE_FORMAT = '{root}\\{section}\\{container}\\{context}\\{version}\\{path}\\{class}';

    private Stringable $section;
    private Stringable $container;
    private Stringable $context;
    private Stringable $version;
    private Stringable $path;
    private Stringable $class;
    private Stringable $root;

    public function __construct(
        string $section,
        string $container,
        ?string $context = null,
        ?string $version = null,
        ?string $path = null,
        ?string $class = null,
        string $root = Self::DEFAULT_ROOT,
    )
    {
        $this->root      = Str::of($root)->replace('/', Self::PATH_SEPARATOR)->rtrim(Self::PATH_SEPARATOR);
        $this->section   = Str::of($section)->replace('/', Self::PATH_SEPARATOR)->rtrim(Self::PATH_SEPARATOR);
        $this->container = Str::of($container)->replace('/', Self::PATH_SEPARATOR)->rtrim(Self::PATH_SEPARATOR);
        $this->context   = Str::of($context)->replace('/', Self::PATH_SEPARATOR)->rtrim(Self::PATH_SEPARATOR);
        $this->version   = Str::of($version)->replace('/', Self::PATH_SEPARATOR)->rtrim(Self::PATH_SEPARATOR);
        $this->path      = Str::of($path)->replace('/', Self::PATH_SEPARATOR)->rtrim(Self::PATH_SEPARATOR);
        $this->class     = Str::of($class)->replace('/', Self::PATH_SEPARATOR)->rtrim(Self::PATH_SEPARATOR);
    }

    public function __set(string $segmentName, Stringable|string $segmentContent = null)
    {
        $segmentValue = Str::of($segmentContent)
            ->replace('/', Self::PATH_SEPARATOR)
            ->ltrim(Self::PATH_SEPARATOR);

        $this->$segmentName = match ($segmentName) {
            'section',
            'container',
            'context',
            'version',
            'class'     => $segmentValue->rtrim(Self::PATH_SEPARATOR),
            'path',     => $segmentValue,
            'root'      => Str::of($segmentContent ?? Self::DEFAULT_ROOT)->replace('/', '\\')->rtrim(Self::PATH_SEPARATOR),
            default     => null,
        };
    }

    public function __get(string $segmentName)
    {
        return $this->$segmentName;
    }

    public function dump()
    {
        dump($this);

        return $this;
    }

    public function dd()
    {
        dd($this);
    }

    /**
     * From an expression like 'App\Containers\Sat\V33\Models\Comprobante\Conceptos\Concepto'
     * It will parse into appropriate segments
     *
     * @param  string $fqcn [description]
     * @return [type]       [description]
     */
    public static function parseFromFqcn(string $fqcn): NamespaceBuilder
    {
        $fqcn = str_replace('/', Self::PATH_SEPARATOR, $fqcn);

        $patternSegments = "/(?<root>App\\\\Containers)(\\\\(?<section>[A-Za-z0-9]+))(\\\\(?<container>[A-Za-z0-9]+))(\\\\(?<context>[A-Za-z0-9]+))(\\\\(?<version>V[0-9]+))?(?<path_class>\\\\[\\\\A-Za-z0-p]+))?/";

        preg_match_all($patternSegments, $fqcn, $matches, PREG_SET_ORDER);

        [
            'root'       => $root,
            'section'    => $section,
            'container'  => $container,
            'context'    => $context,
            'version'    => $version,
            'path_class' => $path_class,
        ] = array_filter($matches[0], fn ($key) => !is_numeric($key), ARRAY_FILTER_USE_KEY);

        [
            'path'  => $path,
            'class' => $class,
        ] = Self::splitPathClass($path_class);

        return new Self($root, $section, $container, $context, $version, $path, $class);
    }

    /**
     * Splits an partial namespace class into the path and the class name
     *
     * @param  string $path_class [description]
     * @return [type]             [description]
     */
    public static function splitPathClass(string $path_class): array
    {
        $path_class = Str::of($path_class)
            ->replace('/', Self::PATH_SEPARATOR)
            ->start(self::PATH_SEPARATOR);

        $class = $path_class
            ->afterLast(Self::PATH_SEPARATOR)
            ->rtrim(Self::PATH_SEPARATOR)
            ->toString();

        $path = ($path = $path_class
            ->beforeLast(Self::PATH_SEPARATOR)
            ->whenNotEmpty(
                fn ($path) => $path->ltrim(Self::PATH_SEPARATOR)->toString(),
                fn ($path) => $path->toString()
            )) ?: null;

        return [
            'path'  => $path,
            'class' => $class,
        ];
    }

    /**
     * Given the instance is properly initialized, it takes this:
     *     "{root}\{section}\{container}\{context}\{version}\{path}\{class}"
     * and returns something like this:
     *     "App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos\Concepto"
     * @return [type] [description]
     */
    public function getFullyQualifiedClassName()
    {
        // "{root}\{section}\{container}\{context}\{version}\{path}\{class}"
        return Str::of(Self::FULL_NAMESPACE_FORMAT)
            ->replaceLast('{root}', $this->root ?? Self::DEFAULT_ROOT)                          // "App\Containers\{section}\{container}\{context}\{version}\{path}\{class}"
            ->replaceLast('{section}', $this->section)                                          // "App\Containers\Sat\{container}\{context}\{version}\{path}\{class}"
            ->replaceLast('{container}', $this->container)                                      // "App\Containers\Sat\Cfdi\{context}\{version}\{path}\{class}"
            ->replaceLast('{context}', $this->context)                                          // "App\Containers\Sat\Cfdi\Models\{version}\{path}\{class}"
            ->replaceLast(Self::PATH_SEPARATOR.'{version}', $this->version->isNotEmpty() ? $this->version->start(Self::PATH_SEPARATOR) : null)   // "App\Containers\Sat\Cfdi\Models(\V33)\{path}\{class}"
            ->replaceLast(Self::PATH_SEPARATOR.'{path}', $this->path->isNotEmpty() ? $this->path->start(Self::PATH_SEPARATOR) : null)            // "App\Containers\Sat\Cfdi\Models\V33(\Comprobante\Conceptos)\{class}"
            ->replaceLast(Self::PATH_SEPARATOR.'{class}', $this->class->isNotEmpty() ? $this->class->start(Self::PATH_SEPARATOR) : null);        // "App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos\Concepto"
    }

    public function getFullyQualifiedClassConstant()
    {
        return $this->getFullyQualifiedClassName()->finish(Self::CLASS_CONSTANT);
    }

    /**
     * It returns a concatenation of the selected segments in the provided order of them
     * by default it takes container, version and context, in that order
     * given:
     *     "App\Containers\Sat\Cfdi\Models\V33\Comprobante\Conceptos\Concepto"
     * it returns:
     *     "CfdiV33Models"
     * @param  array|null $keysToFormatBy [description]
     * @return [type]                     [description]
     */
    public function getFormattedAliasName(array $segmentsToAliasBy = null)
    {
        $segmentsToAliasBy = $segmentsToAliasBy ?? ['container', 'version', 'context'];

        return collect($segmentsToAliasBy)
            ->map(fn ($segment, $segmentName) => is_callable($segment)
                ? $segment($this->$segmentName)
                : $this->$segment)
            ->pipe(fn ($selectedSegments) => Str::of($selectedSegments->implode('')));
    }

    // public function getQualifiedAliasName(array $segmentsToAliasBy = null)
    // {
    //     return $this
    //         ->getFormattedAliasName($segmentsToAliasBy);
    // }

    public function getQualifiedClassName(array $segmentsToAliasBy = null)
    {
        return $this
            ->getFormattedAliasName($segmentsToAliasBy)
            ->when(
                $this->class->isNotEmpty(),
                fn ($qcn) => $qcn->append($this->class->prepend(Self::PATH_SEPARATOR))
            );
    }

    public function getQualifiedClassConstant(array $segmentsToAliasBy = null)
    {
        return $this->getQualifiedClassName($segmentsToAliasBy)->finish(Self::CLASS_CONSTANT);
    }

    /**
     * [valuesAsArray description]
     * @return [type] [description]
     */
    public function valuesAsArray()
    {
        return [
            'root'      => $this->root->toString(),
            'section'   => $this->section->toString(),
            'container' => $this->container->toString(),
            'context'   => $this->context->toString(),
            'version'   => $this->version->toString(),
            'path'      => $this->path->toString(),
            'class'     => $this->class->toString(),
        ];
    }
}
