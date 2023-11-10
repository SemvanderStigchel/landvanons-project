<?php

namespace App\Http\Middleware;

use App\Models\Post;
use App\Models\Task;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, Post $post, Task $task): Response
    {
        if (\Auth::user()->id === $post->user_id)
        {
            return $next($request);
        } elseif (\Auth::user()->id === $task->user_id)
        {
            return $next($request);
        }
        return redirect(route('home'));
    }
}
