<?php

namespace App\Http\Middleware;

use App\Models\Post;
use App\Models\Task;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsOwnerPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $post = $request->route('post');
        if (\Auth::user()->id === $post->user_id)
        {
            return $next($request);
        }
        return redirect(route('home'));
    }
}
