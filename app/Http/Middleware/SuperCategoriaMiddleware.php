<?php

namespace App\Http\Middleware;

use Closure;
use App\Entities\Admin\Categories;
use Illuminate\Routing\Route;
use Auth;
use Session;

class SuperCategoriaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct(Route $route)
    {
        $this->route = $route;
    }


    public function handle($request, Closure $next)
    {   




        $catId      = $this->route->getParameter('cat_id');

        if(is_null($catId)) { return $next($request); }


        $categoria  = Categories::find($catId);
       
        if( Auth::user()->is( strtolower($categoria->name )) ){
            return $next($request);
        }
            return redirect()->back()->withErrors(['Permiso denegado.']);


    }   
}
