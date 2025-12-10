<?php

namespace Architecture\XmlSchemator\Providers\Traits;

trait FileSystemRegisterTrait
{
    public const ASSETS_DISK = 'architecture-xmlSchemator-assets';

    protected function registerFilesystemDisks(): void
    {
        // This comes from src/Configs/architecture-xmlSchemator.php
        $assetDiskConfig = config('architecture-xmlSchemator.disks.assets');

        if (! is_array($assetDiskConfig)) {
            // Optional: guard / log if not configured correctly
            return;
        }

        // Put it under filesystems.disks.<disk-name>
        config()->set(
            'filesystems.disks.' . self::ASSETS_DISK,
            $assetDiskConfig
        );
    }
}
