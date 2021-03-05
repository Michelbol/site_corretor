<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Log;

class LogAfterRequest
{
    private $route;

    function __construct(Route $route)
    {
        $this->route = $route;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Log::info('Application Url:', ['request' => $request->url()]);
        \Log::info('Application Headers:', ['request' => $request->header()]);
        \Log::info('Application Request:', ['request' => $request->all()]);
        \Log::info("Route controller and action: " . $this->route->getActionName());
        return $next($request);
    }
}
