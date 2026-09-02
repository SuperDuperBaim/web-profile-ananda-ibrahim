<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $ip = $request->ip();
            $today = \Carbon\Carbon::today()->toDateString();

            \App\Models\Visitor::firstOrCreate([
                'ip_address' => $ip,
                'visited_at' => $today,
            ]);
        } catch (\Throwable $e) {
            // Abaikan error database jika DB belum terhubung di serverless Vercel
        }

        return $next($request);
    }
}
