<?php

namespace Architecture\XmlSchemator\Parents\Builders\Contracts;

use Architecture\XmlSchemator\Parents\Builders\Contracts\BuilderContract;

interface HasParentContract
{
    // public function __construct(BuilderContract $parentBuilder = null);

    public function setParentBuilder(BuilderContract $parentBuilder = null);

    public function getParentBuilder(): ?BuilderContract;
}
