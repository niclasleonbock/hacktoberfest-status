<?php
namespace App\Http\Middleware;

use Closure;

class SetSentryContext
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!app()->environment('local') && app()->bound('sentry')) {
            /** @var \Raven_Client $sentry */
            $sentry = app('sentry');

            // Add user context
            if (auth()->check()) {
                $user = auth()->user();

                $sentry->user_context([
                    'github_username' => $user->github_username,
                    'github_id' => $user->github_id,
                    'github_token' => str_limit($user->github_token, 8),
                ]);
            }
        }

        return $next($request);
    }
}
