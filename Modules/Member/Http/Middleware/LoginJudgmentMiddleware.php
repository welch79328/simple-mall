<?php

namespace Modules\Member\Http\Middleware;

use Modules\Member\Entities\Member;
use Closure;
use Illuminate\Http\Request;

class LoginJudgmentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $roles = $this->getRequiredRoleForRoute($request->route());
        $member_id = session('member.member_id');
        $member = Member::find($member_id);
        $arr = in_array($member->member_level, $roles);

        if ($arr) {
            return $next($request);
        }
        return redirect('member_signin');
    }

    private function getRequiredRoleForRoute($route)
    {
        $actions = $route->getAction();

        return isset($actions['roles']) ? $actions['roles'] : null;
    }
}
