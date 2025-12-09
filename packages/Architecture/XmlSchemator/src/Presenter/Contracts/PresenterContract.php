<?php

namespace Architecture\XmlSchemator\Presenter\Contracts;

use Architecture\XmlSchemator\Presenter\Contracts\Presentable;
use Architecture\XmlSchemator\Presenter\Presenter;

interface PresenterContract
{
    public function presentEntity(Presentable $entity): PresenterContract;
}
