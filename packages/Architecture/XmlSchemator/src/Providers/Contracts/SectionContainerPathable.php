<?php

namespace Architecture\XmlSchemator\Providers\Contracts;

interface SectionContainerPathable
{
    public const CONTAINERS_DIRECTORY_NAME = 'Containers';
    public const SECTION_NAME = 'SectionName';
    public const CONTAINER_NAME = 'ContainerName';

    public static function getSectionContainerPath(): string;
}
