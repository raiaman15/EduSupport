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
        if(!(($request->user()->email=="raiaman15@gmail.com")||($request->user()->email=="sharmaprateek28@gmail.com")||($request->user()->email=="sharmayush17@gmail.com")||($request->user()->email=="bharadwaj.tejasv21@gmail.com"))) 
        //Use hashed value (github is open, so delete me too), try env 
            {return redirect('logout');}
        return $next($request);

    }
}
