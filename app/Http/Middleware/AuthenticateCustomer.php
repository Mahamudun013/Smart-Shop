<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AuthenticateCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $customerId=Session::get('customerId');

        if($customerId){

            return $next($request);
        }
        else{

            return redirect('/');
        }
        
    }
}
