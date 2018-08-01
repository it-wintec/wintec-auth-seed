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
        $response = $next($request);
        
        // if ($request->name != 'jack') {
        //     return redirect('kkkkk');
        // } test 2
        
        return $response;
    }
}
