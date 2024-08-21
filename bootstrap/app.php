<?php

use App\Http\Middleware\ExampleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    //Acá se incluye nuestro Middleware personalizado, que se podrá ejecutar en todas las rutas web ($middleware->web()) y/o Apis ($middleware->api())
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(ExampleMiddleware::class)->alias(['example' => ExampleMiddleware::class]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
