<?php

namespace Architecture\XmlSchemator\Presenter\Contracts;

use Architecture\XmlSchemator\Presenter\Contracts\PresenterContract;
use Architecture\XmlSchemator\Presenter\Presenter;

interface Presentable
{
    public function present(): PresenterContract;

    public function presentAs(Presenter $presenter): PresenterContract;
}
