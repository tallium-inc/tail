<?php

namespace Mookofe\Tail\Http\Middleware;

use Closure;
use Mookofe\Tail\Registry;

class CloseConnections
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    public function terminate($request, $response)
    {
        foreach (Registry::all() as $connection) {
            $connection->close();
        }
    }
}
