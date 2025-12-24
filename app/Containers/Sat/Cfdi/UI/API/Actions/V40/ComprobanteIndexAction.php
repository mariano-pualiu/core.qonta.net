<?php

namespace App\Containers\Sat\Cfdi\UI\API\Actions\V40;

use Illuminate\Routing\Router;
use Lorisleiva\Actions\Concerns\AsAction;

class ComprobanteIndexAction
{
    use AsAction;

    public static function routes(Router $router)
    {
        $router->get('v1/cfdi/comprobantes', static::class);
    }

    public function handle(User $user, string $newPassword)
    {
        // ...
    }

    public function asController(User $user, Request $request): Response
    {
        // $article = $this->handle(
        //     $user,
        //     $request->get('title'),
        //     $request->get('body')
        // );

        // return redirect()->route('articles.show', [$article]);
    }
}
