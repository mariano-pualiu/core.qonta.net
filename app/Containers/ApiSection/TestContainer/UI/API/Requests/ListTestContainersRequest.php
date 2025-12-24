<?php

namespace App\Containers\ApiSection\TestContainer\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

final class ListTestContainersRequest extends ParentRequest
{
    protected array $decode = [];

    public function rules(): array
    {
        return [];
    }
}
