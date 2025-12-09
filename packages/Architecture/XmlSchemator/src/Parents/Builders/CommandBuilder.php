<?php

namespace Architecture\XmlSchemator\Parents\Builders;

use Architecture\XmlSchemator\Parents\Builders\Contracts;
use Architecture\XmlSchemator\Parents\Builders\Traits;

abstract class CommandBuilder implements Contracts\CommandBuilderContract, Contracts\HasParentContract, Contracts\ReseteableContract
{
    // const PROXY_METHODS = [];

    public $runStatus = null;

    use Traits\Parentable/*, Proxyable*/, Traits\Reseteable;

    public function __construct(BuilderContract $parentBuilder = null)
    {
        // foreach(Static::PROXY_METHODS as $alias => $method){
        //     static::proxy($method, $alias);
        // }

        // static::fallbackProxy('getParentBuilder');

        // $this->setParentBuilder($parentBuilder);

        $this->reset();
    }
}
