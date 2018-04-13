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
        $redirectPath = $request->path();
        $roles = $this->getRequiredRoleForRoute($request->route());
        $member_id = session('member.member_id');
        $member = Member::find($member_id);
        if (empty($member)) {
            return redirect()->route('member_signin', ['path' => $redirectPath]);
        }

        if (in_array($member->member_level, $roles)) {
            return $next($request);
        }
        return redirect()->route('member_signin', ['path' => $redirectPath]);
    }

    private function getRequiredRoleForRoute($route)
    {
        $actions = $route->getAction();

        return isset($actions['roles']) ? $actions['roles'] : null;
    }
}
