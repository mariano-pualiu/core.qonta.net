<?php

namespace App\Containers\Sat\Cfdi\UI\API\Transformers\V40;

use App\Containers\Sat\Cfdi\Models\V40\Comprobante;

class ComprobanteTransformer extends Transformer
{
    protected $availableIncludes = [
        // 'emisor',
        // 'receptor',
        // 'complemento',
        // ...
    ];

    protected $defaultIncludes = [
        'emisor',
        'receptor',
        'complemento',
    ];

    public function transform(Comprobante $comprobante)
    {
        $response = [
            'object'              => $comprobante->getResourceKey(),
            'id'                  => $comprobante->getHashedKey(),

            // 'Version',         => $comprobante->Version->toArray() + ['r' => ],
            'Serie'               => $comprobante->Serie->toArray(),
            'Folio'               => $comprobante->Folio->toArray(),
            'Fecha'               => $comprobante->Fecha->toArray(),
            'Sello'               => $comprobante->Sello->toArray(),
            'FormaPago'           => $comprobante->FormaPago->toArray(),
            'NoCertificado'       => $comprobante->NoCertificado->toArray(),
            'Certificado'         => $comprobante->Certificado->toArray(),
            'CondicionesDePago'   => $comprobante->CondicionesDePago->toArray(),
            'SubTotal'            => $comprobante->SubTotal->toArray(),
            'Descuento'           => $comprobante->Descuento->toArray(),
            'Moneda'              => $comprobante->Moneda->toArray(),
            'TipoCambio'          => $comprobante->TipoCambio->toArray(),
            'Total'               => $comprobante->Total->toArray(),
            'TipoDeComprobante'   => $comprobante->TipoDeComprobante->toArray(),
            'Exportacion'         => $comprobante->Exportacion->toArray(),
            'MetodoPago'          => $comprobante->MetodoPago->toArray(),
            'LugarExpedicion'     => $comprobante->LugarExpedicion->toArray(),
            'Confirmacion'        => $comprobante->Confirmacion->toArray(),

            // 'name'             => $comprobante->name,
            // 'description'      => $comprobante->description,
            // 'price'            => (float)$comprobante->price,
            // 'weight'           => (float)$comprobante->weight,
            // 'created_at'       => $comprobante->created_at,
            // 'updated_at'       => $comprobante->updated_at,

            'readable_created_at' => $comprobante->created_at->diffForHumans(),
            'readable_updated_at' => $comprobante->updated_at->diffForHumans(),
        ];

        // add more or modify data for Admins only
        $response = $this->ifAdmin([
            'real_id'    => $comprobante->id,
            'deleted_at' => $comprobante->deleted_at,
        ], $response);

        return $response;
    }

    public function includeEmisor(Comprobante $comprobante)
    {
        return $this->collection($comprobante->images, new ItemImageTransformer());
    }

    public function includeRoles(User $user)
    {
        return $this->collection($user->roles, new RoleTransformer());
    }
}
