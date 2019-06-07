<?php

namespace Modules\AdminMember\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminLoginJudgmentMiddleware
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

        $arr = in_array(session('admin_member.member_level'),$roles);

        if ($arr) {
            return $next($request);
        }
        return redirect('admin/login');
    }

    private function getRequiredRoleForRoute($route)
    {
        $actions = $route->getAction();

        return isset($actions['roles']) ? $actions['roles'] : null;
    }
}
