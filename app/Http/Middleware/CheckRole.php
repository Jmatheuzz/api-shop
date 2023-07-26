<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {

        $user = $request->user();

        if (!$user || ! in_array($user->role, $roles)) {
            return response()->json( ['error' => 'not permission for this endpoint'], HttpResponse::HTTP_FORBIDDEN);
        }

        return $next($request);

    }
}
