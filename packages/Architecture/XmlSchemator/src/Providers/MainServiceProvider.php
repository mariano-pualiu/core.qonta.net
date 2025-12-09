<?php

namespace Architecture\XmlSchemator\Providers;

use App\Ship\Parents\Providers\ServiceProvider as ParentServiceProvider;

/**
 * The Main Service Provider of this container.
 * It will be automatically registered by the framework.
 */
class MainServiceProvider extends ParentServiceProvider /*implements Contracts\SectionContainerPathable*/
{
    public const CONTAINERS_DIRECTORY_NAME = 'Containers';
    public const SECTION_NAME = 'SectionName';
    public const CONTAINER_NAME = 'ContainerName';

    public function register(): void
    {
        $containerPath = self::getSectionContainerPath();
        dd($containerPath);
        // $this->loadConfigsFromContainers($containerPath);
        // $this->loadCommandsFromContainers($containerPath);
    }

    public function boot(): void
    {
    }

    public static function getSectionContainerPath(): string
    {
        return dirname(__DIR__);
    }

    // use Traits\ConfigsLoaderTrait;
    // use Traits\CommandsLoaderTrait;
    // // use Traits\HelpersLoaderTrait;

    // public const SECTION_NAME = 'Architecture';
    // public const CONTAINER_NAME = 'XmlSchemator';

    // public array $serviceProviders = [
    //     // InternalServiceProviderExample::class,
    // ];

    // public array $aliases = [
    //     // 'Foo' => Bar::class,
    // ];

    // public function register(): void
    // {
    //     parent::register();

    //     $this->app['config']['filesystems.disks.architecure-xml_schemator-assets'] = config('architecture-xmlSchemator.disks.assets');

    //     $containerPath = self::getSectionContainerPath();

        // $this->loadConfigsFromContainers($containerPath);
        // $this->loadCommandsFromContainers($containerPath);
    //     // $this->loadHelpersFromContainers($containerPath);
    // }

    // public static function getSectionContainerPath(): string
    // {
    //     return dirname(__DIR__);
    // }
}
