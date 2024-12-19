<?php

namespace App\Middleware;

class CheckManagerRoleMiddleware
{
    public function handle($requestUri, $next)
    {
        if ($_SESSION['user_role'] !== 'manager') {
            header('Location: /dashboard');
            exit;
        }
        // Continue to the next middleware or controller action
        return $next($requestUri);
    }
}
