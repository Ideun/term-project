<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Board;

class CheckOwner
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
        $user = Auth::user();
        $id=$request->route('board');
        $b=Board::find($id);
        if(!$b || $user->name != $b->writer){
            flash('권한X')->error();
            return back();
        }

        return $next($request);
    }
}
