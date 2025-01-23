<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class tokenVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('token');

        if (! $token) {
            return redirect('/userLogin')->with('error', 'Authentication token missing.');
        }

        $result = JWTToken::verifyToken($token);

        if ($result === 'unauthorized') {
            return redirect('/userLogin')->with('error', 'Unauthorized access.');
        }

        // Dynamically set all verified data onto request headers
        foreach ((array) $result as $key => $value) {
            $request->headers->set($key, $value);
        }

        return $next($request);
    }
}
