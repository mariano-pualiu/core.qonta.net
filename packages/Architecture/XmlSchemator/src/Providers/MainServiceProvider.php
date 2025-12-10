<?php

namespace Architecture\XmlSchemator\Providers;

use App\Ship\Parents\Providers\ServiceProvider as ParentServiceProvider;

/**
 * The Main Service Provider of this container.
 * It will be automatically registered by the framework.
 */
class MainServiceProvider extends ParentServiceProvider /*implements Contracts\SectionContainerPathable*/
{
    use Traits\ConfigsLoaderTrait;
    use Traits\FileSystemRegisterTrait;
    use Traits\CommandsLoaderTrait;

    public const SECTION_NAME = 'Architecture';
    public const CONTAINER_NAME = 'XmlSchemator';

    public function register(): void
    {
        // $this->app['config']['filesystems.disks.architecure-xmlSchemator-assets'] = config('architecture-xmlSchemator.disks.assets');
        $containerPath = self::getSectionContainerPath();
        // dump($containerPath);
        $this->loadConfigsFromContainers($containerPath);
        // $coreSections = config('architecture-xmlSchemator.core.sections');
        // dd($coreSections);
        // $this->app['config']['filesystems.disks.architecure-xml_schemator-assets'] = config('architecture-xmlSchemator.disks.assets');
        $this->registerFilesystemDisks();


    //     // $this->loadHelpersFromContainers($containerPath);
    }

    public function boot(): void
    {
        $containerPath = self::getSectionContainerPath();
        $this->loadCommandsFromContainers($containerPath);
    }

    public static function getSectionContainerPath(): string
    {
        return dirname(__DIR__);
    }
}
