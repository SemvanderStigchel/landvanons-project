<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PayOutPoints
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guest()) {
            return $next($request);
        }
        $user = Auth::user();
        foreach ($user->enrollments as $task) {
            if ($task->status === 2) {
                $pointsTask = $task->points_earned;
                $pointsUser = $user->points;
                $result = $pointsUser + $pointsTask;

                $user->points = $result;
                $user->save();

                $task->users()->detach(Auth::user()->id);
                return $next($request);
            }
        }
        return $next($request);
    }
}
