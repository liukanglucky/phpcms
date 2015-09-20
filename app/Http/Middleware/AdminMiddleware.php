<?php namespace App\Http\Middleware;

use Closure;
use Auth;
use Response;

class AdminMiddleware {

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
		
		if($user==null){
			return Response::view('admin/adminlogin');
		}else{
			if($user->status != '10')
				return view('admin/adminlogin');
			else
				return $next($request);
		}
		return $next($request);
	}

}
