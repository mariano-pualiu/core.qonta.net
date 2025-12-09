<?php

namespace Architecture\XmlSchemator\Builders\Traits;

use Architecture\XmlSchemator\Values\ApiBuilderDirectorData;

trait SetsBuilderDirectorData
{
    /**
     * @var ApiBuilderDirectorData the set of minimum values required for a section to generate the stubs
     */
    protected ?ApiBuilderDirectorData $builderDirectorData = null;

    public function setBuilderDirectorData(ApiBuilderDirectorData $builderDirectorData = null)
    {
        $this->builderDirectorData = $builderDirectorData;

        $this->registerReseteableParameter('builderDirectorData', __FUNCTION__);

        return $this;
    }
}
