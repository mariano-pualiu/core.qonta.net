<?php

namespace Architecture\XmlSchemator\Parents\Builders\Traits;

use Architecture\XmlSchemator\Parents\Builders\Contracts;
use Exception;

trait Reseteable
{
    protected array $reseteableParametersList = [];

    public function registerReseteableParameter(string $parameterName, string $resetMethodName): void
    {
        if (!method_exists($this, $resetMethodName)) {
            throw new Exception("The reset method {$resetMethodName} specified doesn't exists", 1);
        }

        $this->reseteableParametersList[$parameterName] = $resetMethodName;
    }

    public function reset(): Contracts\ReseteableContract
    {
        // dump($this->reseteableParametersList);
        foreach ($this->reseteableParametersList as $parameterName => $resetMethodName) {
            if (method_exists($this, $resetMethodName)) {
                $this->$resetMethodName();
            }
        };

        return $this;
    }
}
