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
        $ip = $request->ip();
        $today = \Carbon\Carbon::today()->toDateString();
        
        try {
            \App\Models\Visitor::firstOrCreate([
                'ip_address' => $ip,
                'visited_at' => $today,
            ]);
        } catch (QueryException $e) {
            // Ignore duplicate entry race conditions (SQLSTATE 23000 / error 1062)
            if ($e->getCode() === '23000' || (isset($e->errorInfo[1]) && $e->errorInfo[1] == 1062)) {
                // someone else inserted the same visitor concurrently; safe to ignore
            } else {
                throw $e;
            }
        }

        return $next($request);
    }
}
