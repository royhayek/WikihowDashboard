<?php
namespace App\Http\Middleware;

use Closure;

class ApiVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = env('API_TOKEN');
        $requestToken = $request->header('Authorization');

        if ($token != $requestToken) {
            return response()->json('Unauthorized', 401);
        }

        return $next($request);
    }
}