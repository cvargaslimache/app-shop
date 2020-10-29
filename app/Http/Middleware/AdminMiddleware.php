<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //para verificar si el usuario inicio sesion , metodo check

        //si ha iniciado sesion, se verifica si es un usuario administrador, en caso que no sea se redirige a la ruta login
        if (!auth()->user()->admin) {
            return redirect('/');
        }
        return $next($request);
    }
}
