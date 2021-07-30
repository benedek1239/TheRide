<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\App;
use Closure;
use Illuminate\Support\Facades\URL;
use Redirect;

class Localization
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
        if(isset($request->lang)){
            app()->setlocale($request->lang);
        } else {
            app()->setlocale('hu');
            return Redirect::to('https://theride.info/hu');
        }
        return $next($request);
    }
}
