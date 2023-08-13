<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
                //Check password before visit any routes
        if ($request->api_password !== env('API_PASSWORD', 'DOaxXxEmXCCOkAB3Axf2v'))
            return response()->json(['401' => 'Please insert Api Password and try again']);

        return $next($request);
    }
}
