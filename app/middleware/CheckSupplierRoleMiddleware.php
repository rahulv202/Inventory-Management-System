<?php

namespace App\Middleware;

class CheckSupplierRoleMiddleware
{
    public function handle($requestUri, $next)
    {
        if ($_SESSION['user_role'] !== 'supplier') {
            header('Location: /dashboard');
            exit;
        }
        // Continue to the next middleware or controller action
        return $next($requestUri);
    }
}
