<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(empty($request->user()) && empty(\Auth::user())){
            return redirect()->route('welcome');
        };
        if (!empty($request->user()) && ($request->user()->hasRole('admin') || $request->user()->hasRole('loaders') ) ) {
            return $next($request);
        }
        
        if($request->user()->isAdmin()){
            return redirect()->route('admin');
        };
        
        
        return back()->withErrors(['No estás autorizado']); 
    }
}