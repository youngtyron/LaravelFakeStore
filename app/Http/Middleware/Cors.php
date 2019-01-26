<?php
// /app/Http/Middleware/Cors.php
namespace App\Http\Middleware;

use Closure;

class Cors {
    public function handle($request, Closure $next)
    {
        // if ($request->isMethod('OPTIONS')){
        //     $response = Response::make();
        // }
        // else {
        //     $response = $next($request);
        // }
        // return $next($request)
        //     ->header('Access-Control-Allow-Origin', 'http://localhost:8000')
        //     ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        if ($request->isMethod('OPTIONS')){
            $response = Response::make();
        }
        else {
            $response = $next($request);
        }
        return $response
            ->header('Access-Control-Allow-Origin', 'http://localhost:8000')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
}
