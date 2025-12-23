<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class CompareSchematorFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:compare-schemator-files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $oldSchematorPath = 'packages/Architecture/OldXmlSchemator';

        $oldSchematorFiles = Storage::disk('base')->allFiles($oldSchematorPath);

        $oldSchematorFiles = collect($oldSchematorFiles)
            ->reject(fn($fileName) => Str::contains($fileName, [
                'Configs/sections/sat',
                'Configs/sections/services',
                // 'Analyzers/Xml/Builders/Configs',
                // 'Analyzers/Xml/Builders/Enums',
                // 'Analyzers/Xml/Builders/Mappings',
                // 'Analyzers/Xml/Builders/Models',
                // 'Analyzers/Xml/Builders/Schemas',
                // 'Analyzers/Xml/Builders/Transformers',
                // 'Analyzers/Xml/Builders/Values',
            ]))
            ->reject(fn($fileName) => Str::endsWith($fileName, [
                '.stub',
                '.cache',
                '.gitkeep',
                '.gitignore',
                '.XML',
                'test.php',
            ]))
            ->mapWithKeys(
                fn($fileName) => [
                    // $fileName => (string) Str::afterLast($fileName, '/')

                    $fileName => (string) Str::of($fileName)->whenContains(
                        [
                            'Analyzers/Xml/Builders/Configs/ElementCommandBuilder.php',
                            'Analyzers/Xml/Builders/Enums/ElementCommandBuilder.php',
                            'Analyzers/Xml/Builders/Mappings/ElementCommandBuilder.php',
                            'Analyzers/Xml/Builders/Models/ElementCommandBuilder.php',
                            'Analyzers/Xml/Builders/Schemas/ElementCommandBuilder.php',
                            'Analyzers/Xml/Builders/Transformers/ElementCommandBuilder.php',
                            'Analyzers/Xml/Builders/Values/AttributeCommandBuilder.php',
                            'Analyzers/Xml/Builders/Values/ElementCommandBuilder.php',
                        ],
                        fn(Stringable $string) => $string->beforeLast('/')->afterLast('/') . '/' . $string->afterLast('/'),
                        fn(Stringable $string) => $string->afterLast('/')
                    )
                ]
            );
        // ->groupBy(fn ($fileName) => (string) $fileName)
        // ->filter(fn ($group) => $group->count() > 1)
        // ->dd();

        $newSchematorPath = 'packages/Architecture/XmlSchemator/src';

        $newSchematorFiles = Storage::disk('base')->allFiles($newSchematorPath);

        $newSchematorFiles = collect($newSchematorFiles)
            ->reject(fn($fileName) => Str::contains($fileName, [
                'Configs/sections/sat',
                'Configs/sections/services'
            ]))
            ->reject(fn($fileName) => Str::endsWith($fileName, [
                '.stub',
                '.cache',
                '.gitkeep',
                '.gitignore',
                '.XML',
                'test.php',
            ]))
            ->mapWithKeys(
                fn($fileName) => [
                    // $fileName => (string) Str::afterLast($fileName, '/')

                    $fileName => (string) Str::of($fileName)->whenContains(
                        [
                            'src/Contexts/Configs/ElementCommandBuilder.php',
                            'src/Contexts/Enums/ElementCommandBuilder.php',
                            'src/Contexts/Mappings/ElementCommandBuilder.php',
                            'src/Contexts/Models/ElementCommandBuilder.php',
                            'src/Contexts/Schemas/ElementCommandBuilder.php',
                            'src/Contexts/Transformers/ElementCommandBuilder.php',
                            'src/Contexts/Values/ElementCommandBuilder.php',
                        ],
                        fn(Stringable $string) => $string->beforeLast('/')->afterLast('/') . '/' . $string->afterLast('/'),
                        fn(Stringable $string) => $string->afterLast('/')
                    )
                ]
            );
        // ->groupBy(fn ($fileName) => (string) Str::afterLast($fileName, '/'))
        // ->filter(fn ($group) => $group->count() > 1)
        // ->dd();

        $oldSchematorFiles->diff($newSchematorFiles)->dd();
        // $newSchematorFiles->diff($oldSchematorFiles)->dd();
    }
}
