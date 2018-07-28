<?php

namespace App\Http\Middleware;

use Closure;

class CheckName
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
        // echo $request->name;
        // exit('11');
        
        // if ($request->name != 'jack') {
        //     return redirect('kkkkk');
        // }
        return $next($request);
    }
}
