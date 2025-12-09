<?php

namespace Architecture\XmlSchemator\Parents\Builders;

use Architecture\XmlSchemator\Parents\Builders\Contracts\ReseteableContract;
use Architecture\XmlSchemator\Parents\Builders\Traits\Reseteable;

abstract class SimpleBuilder implements ReseteableContract
{
    public $runStatus = null;

    use Reseteable;

    public function __construct()
    {
        $this->reset();
    }
}
