<?php namespace CodeCommerce\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AuthenticateAdmin {

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

	public function handle($request, Closure $next)
	{
        if ($request->user()->is_admin != 1)
        {
            return redirect()->route('store');
        }
		return $next($request);
	}

}
