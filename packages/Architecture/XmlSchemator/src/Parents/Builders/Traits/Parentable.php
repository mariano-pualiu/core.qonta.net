<?php

namespace Architecture\XmlSchemator\Parents\Builders\Traits;

use Architecture\XmlSchemator\Parents\Builders\Contracts\BuilderContract;

trait Parentable
{
    public ?BuilderContract $parentBuilder = null;

    public function setParentBuilder(BuilderContract $parentBuilder = null)
    {
        $this->parentBuilder = $parentBuilder;
    }

    public function getParentBuilder(): ?BuilderContract
    {
        return $this->parentBuilder;
    }
}
