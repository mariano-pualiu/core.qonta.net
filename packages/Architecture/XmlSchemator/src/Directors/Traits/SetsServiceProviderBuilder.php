<?php

namespace Architecture\XmlSchemator\Directors\Traits;

use Architecture\XmlSchemator\Builders\ServiceProviderCommandBuilder;

// trait that sets $serviceProviderBuilder property of ServiceProviderCommandBuilder class and setter returns $this
trait SetsServiceProviderBuilder
{
    /**
     * @var ServiceProviderCommandBuilder
     */
    public $serviceProviderBuilder;

    /**
     * @param ServiceProviderCommandBuilder $serviceProviderBuilder
     *
     * @return $this
     */
    public function setServiceProviderBuilder(ServiceProviderCommandBuilder $serviceProviderBuilder)
    {
        $this->serviceProviderBuilder = $serviceProviderBuilder;

        return $this;
    }
}
