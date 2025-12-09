<?php

namespace Architecture\XmlSchemator\Parents\Builders\Contracts;

use Architecture\XmlSchemator\Parents\Builders\Contracts\BuilderContract;

interface CommandBuilderContract extends BuilderContract
{
    public function runCommand();
}
