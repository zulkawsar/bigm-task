<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class DBRollbackIfError
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
        DB::beginTransaction();

        $response = $next($request);

        DB::commit();

        return $response;
    }
}
