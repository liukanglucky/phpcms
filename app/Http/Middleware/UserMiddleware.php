<?php namespace App\Http\Middleware;

use Closure;
use Auth;
use Response;

class UserMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$user = Auth::user();
		if($user == null){
			return  Response::view('/auth/login');
		}
		return $next($request);
	}

}
