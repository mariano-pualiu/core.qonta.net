<?php

namespace Architecture\XmlSchemator\Presenter\Traits;

use Architecture\XmlSchemator\Presenter\Contracts\PresenterContract;
use Architecture\XmlSchemator\Presenter\Presenter;

trait HasPresenter
{
    public function present(): PresenterContract
    {
        if (is_null($this->presenter)) {
            throw new Exception('Presenter Class attribute must be provided.');
        }

        $presenter = new $this->presenter;

        return $presenter->presentEntity($this);
    }

    public function presentAs(Presenter $presenter): PresenterContract
    {
        return $presenter->presentEntity($this);
    }
}
