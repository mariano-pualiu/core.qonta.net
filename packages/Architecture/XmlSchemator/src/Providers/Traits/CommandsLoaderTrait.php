<?php

namespace Architecture\XmlSchemator\Providers\Traits;

// use Apiato\Core\Foundation\Facades\Apiato;
use Apiato\Foundation\Apiato;
use Illuminate\Support\Facades\File;

trait CommandsLoaderTrait
{
    public const COMMANDS_PATH = 'Generators/Commands';

    public function loadCommandsFromContainers(string $containerPath): void
    {
        $containerCommandsDirectory = $containerPath . '/' . static::COMMANDS_PATH;

        $this->registerCommandsFrom($containerCommandsDirectory, 'Architecture\\XmlSchemator\\Generators\\Commands');
    }

    // private function loadTheConsoles($directory): void
    // {
    //     if (File::isDirectory($directory)) {
    //         $files = File::allFiles($directory);

    //         foreach ($files as $consoleFile) {
    //             // Do not load route files
    //             if (!$this->isRouteFile($consoleFile)) {
    //                 $consoleClass = Apiato::getClassFullNameFromFile($consoleFile->getPathname());
    //                 // When user from the Main Service Provider, which extends Laravel
    //                 // service provider you get access to `$this->commands`
    //                 $this->commands([$consoleClass]);
    //             }
    //         }
    //     }
    // }

    protected function registerCommandsFrom(string $directory, string $baseNamespace): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        if (! is_dir($directory)) {
            return;
        }

        /** @var SplFileInfo[] $files */
        $files = File::allFiles($directory);

        $commandClasses = [];

        foreach ($files as $file) {
            if ($file->getExtension() !== 'php' || $this->isRouteFile($file)) {
                continue;
            }

            // e.g. /path/src/Commands/Schema/SyncSchemaCommand.php → Schema/SyncSchemaCommand.php
            $relativePath = str_replace($directory . DIRECTORY_SEPARATOR, '', $file->getPathname());

            // Normalize to namespace segments
            $relativeClass = str_replace(
                [DIRECTORY_SEPARATOR, '.php'],
                ['\\', ''],
                $relativePath
            );

            $fqcn = $baseNamespace . '\\' . $relativeClass;

            $commandClasses[] = $fqcn;
        }
        // dd($commandClasses);
        if (! empty($commandClasses)) {
            $this->commands($commandClasses);
        }
    }

    private function isRouteFile($consoleFile): bool
    {
        return 'closures.php' === $consoleFile->getFilename();
    }
}
