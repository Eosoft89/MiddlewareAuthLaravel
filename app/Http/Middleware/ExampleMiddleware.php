<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ExampleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // El middleware sirve para controlar las solicitudes que llegen a nuestra App, ya sea monolítica o API, por ejemplo, se puede ver si un usuario tiene o no rol de admin para refirigirlo a la pantalla correspondiente o lanzar un error.
    //Para crear un nuevo middleware, > php artisan make:middleware ExampleMiddleware
    /* Para incluir globalmente el Middleware, desde Laravel 11 debemos hacerlo en el archivo bootstrap/app.php */

    public function handle(Request $request, Closure $next): Response
    {
        return redirect()->route('no-access');
        //return $next($request);
    }
}
