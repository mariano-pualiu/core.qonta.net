<?php

namespace Architecture\XmlSchemator\Parents\Builders\Contracts;

interface ReseteableContract
{
    public function registerReseteableParameter(string $parameterName, string $resetMethodName): void;

    public function reset(): ReseteableContract;
}
