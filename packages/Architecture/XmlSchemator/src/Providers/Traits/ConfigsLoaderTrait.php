<?php

namespace Architecture\XmlSchemator\Providers\Traits;

use Illuminate\Support\Str;
use SplFileInfo;
use Symfony\Component\Finder\Finder;

trait ConfigsLoaderTrait
{
    public function loadConfigsFromContainers($containerPath): void
    {
        $containerConfigsDirectory = $containerPath . '/Configs';

        $this->loadConfigurationFiles($containerConfigsDirectory);
    }

    /**
     * Load the configuration items from all of the Container's Configs files.
     *
     * @return void
     *
     * @throws \Exception
     */
    protected function loadConfigurationFiles(string $containerConfigsDirectory)
    {
        $prefixName = Str::camel(self::SECTION_NAME) . '-' . Str::camel(self::CONTAINER_NAME);

        $files = $this->getConfigurationFiles($containerConfigsDirectory);

        foreach ($files as $key => $path) {
            $name = $prefixName ? $prefixName . '.' . $key : $key;
            $this->mergeConfigFrom($path, $name);
        }
    }

    /**
     * Get all of the configuration files for the application.
     *
     * @return array
     */
    protected function getConfigurationFiles($containerConfigsDirectory)
    {
        $files = [];
        $configPath = realpath($containerConfigsDirectory);

        foreach (Finder::create()->files()->name('*.php')->in($configPath) as $file) {
            $directory = $this->getNestedDirectory($file, $configPath);

            $files[$directory.basename($file->getRealPath(), '.php')] = $file->getRealPath();
        }

        ksort($files, SORT_NATURAL);

        return $files;
    }

    /**
     * Get the configuration file nesting path.
     *
     * @param  \SplFileInfo  $file
     * @param  string  $configPath
     * @return string
     */
    protected function getNestedDirectory(SplFileInfo $file, $configPath)
    {
        $directory = $file->getPath();

        if ($nested = trim(str_replace($configPath, '', $directory), DIRECTORY_SEPARATOR)) {
            $nested = str_replace(DIRECTORY_SEPARATOR, '.', $nested).'.';
        }

        return $nested;
    }
}
