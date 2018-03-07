<?php

namespace Modules\Member\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginJudgmentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $roles = $this->getRequiredRoleForRoute($request->route());

        $arr = in_array(session('member.member_level'),$roles);

        if ($arr) {
            return $next($request);
        }
        return redirect('member/login');
    }

    private function getRequiredRoleForRoute($route)
    {
        $actions = $route->getAction();

        return isset($actions['roles']) ? $actions['roles'] : null;
    }
}
