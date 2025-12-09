<?php

namespace Architecture\XmlSchemator\Builders\Traits;

trait SetsSectionName
{
    /**
     * @var string the name of the section to generate the stubs
     */
    protected ?string $sectionName = null;

    public function setSectionName(string|callable $sectionName = null)
    {
        $this->sectionName = is_callable($sectionName) ? $sectionName() : $sectionName;

        $this->registerReseteableParameter('sectionName', __FUNCTION__);

        return $this;
    }
}
