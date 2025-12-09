<?php

namespace Architecture\XmlSchemator\Providers\Traits;

// use Apiato\Core\Foundation\Facades\Apiato;
use Apiato\Foundation\Apiato;
use Illuminate\Support\Facades\File;

trait CommandsLoaderTrait
{
    public function loadCommandsFromContainers(string $containerPath): void
    {
        // $containerCommandsDirectory = $containerPath . '/UI/CLI/Commands';
        $containerCommandsDirectory = $containerPath . '/Analyzers/Xml/Commands';

        $this->loadTheConsoles($containerCommandsDirectory);
    }

    private function loadTheConsoles($directory): void
    {
        dump($directory);
        if (File::isDirectory($directory)) {
            $files = File::allFiles($directory);

            foreach ($files as $consoleFile) {
                // Do not load route files
                if (!$this->isRouteFile($consoleFile)) {
                    $consoleClass = Apiato::getClassFullNameFromFile($consoleFile->getPathname());
                    // When user from the Main Service Provider, which extends Laravel
                    // service provider you get access to `$this->commands`
                    $this->commands([$consoleClass]);
                }
            }
        }
    }

    private function isRouteFile($consoleFile): bool
    {
        return 'closures.php' === $consoleFile->getFilename();
    }
}
