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
        //Add more security (email logging and email him warming.)
        if(!($request->user()->email=="raiaman15@gmail.com")) //Use hashed value (github is open), try env
            {return redirect('logout');}
        return $next($request);

    }
}
