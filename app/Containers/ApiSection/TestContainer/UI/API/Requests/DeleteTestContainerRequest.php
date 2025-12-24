<?php

namespace App\Containers\ApiSection\TestContainer\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

final class DeleteTestContainerRequest extends ParentRequest
{
    protected array $decode = [
        'id',
    ];

    public function rules(): array
    {
        return [];
    }
}
