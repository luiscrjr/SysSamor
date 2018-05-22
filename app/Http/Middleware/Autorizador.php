<?php namespace samor\Http\Middleware;

use Closure;

class Autorizador {

	public function handle($request, Closure $next)
	{
		  if(!$request->is('auth/login') && \Auth::guest()){
		  	return redirect('/auth/login');
			 }
			 
		return $next($request);
	}

}
