<?php

namespace Architecture\XmlSchemator\Builders\Traits;

use Illuminate\Support\Collection;

trait SetsContextName
{
    /**
     * @var string
     */
    protected $context;

    /**
     * @param string $context
     *
     * @return $this
     */
    public function setContextName(string $context)
    {
        $this->context = $context;

        return $this;
    }
}
