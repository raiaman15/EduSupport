<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        if(!isset($request->user()))
            abort(403, 'Unauthorized action.');
        if( !(($request->user()->email==config("app.admin_1"))
            ||($request->user()->email==config("app.admin_2"))
            ||($request->user()->email==config("app.admin_3"))
            ||($request->user()->email==config("app.admin_4")))
          ) 
        //Use hashed value (github is open, so delete me too), try env 
            {return redirect('logout');}
        return $next($request);

    }
}
