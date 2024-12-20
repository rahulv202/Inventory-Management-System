<?php
define("APP_PATH", __DIR__ . '/app/');
require_once APP_PATH . 'config/config.php';
require_once __DIR__ . '/libs/helpers.php';
require_once 'vendor/autoload.php';
session_start();


use App\Core\Route;
use App\Middleware\checkAdminRoleMiddleware;
use App\Middleware\CheckLoginMiddleware;
use App\Middleware\CheckLogoutMiddleware;


$router = new Route();
// Define your routes here

$router->get('/register', 'RegisterController@index', [CheckLoginMiddleware::class]);
$router->post('/register', 'RegisterController@register', [CheckLoginMiddleware::class]);
$router->get('/login', 'LoginController@index', [CheckLoginMiddleware::class]);
$router->post('/login', 'LoginController@login', [CheckLoginMiddleware::class]);
$router->get('/dashboard', 'DashboardController@index', [CheckLogoutMiddleware::class]);
$router->get('/logout', 'DashboardController@logout', [CheckLogoutMiddleware::class]);
//Admin routes
$router->get('/manage-users', 'UserController@manageUsers', [CheckLogoutMiddleware::class, checkAdminRoleMiddleware::class]);
$router->get('/edit-user/{param}', 'UserController@editUser', [CheckLogoutMiddleware::class, checkAdminRoleMiddleware::class]);
$router->post('/edit-user', 'UserController@updateUser', [CheckLogoutMiddleware::class, checkAdminRoleMiddleware::class]);
$router->get('/delete-user/{param}', 'UserController@deleteUser', [CheckLogoutMiddleware::class, checkAdminRoleMiddleware::class]);
$router->get('/manage-products', 'AdminController@manageProducts', [CheckLogoutMiddleware::class, checkAdminRoleMiddleware::class]);
$router->get('/add-product', 'AdminController@addProduct', [CheckLogoutMiddleware::class, checkAdminRoleMiddleware::class]);
$router->post('/add-product', 'AdminController@addProduct', [CheckLogoutMiddleware::class, checkAdminRoleMiddleware::class]);
$router->get('/edit-product', 'AdminController@editProduct', [CheckLogoutMiddleware::class, checkAdminRoleMiddleware::class]);
$router->post('/edit-product', 'AdminController@editProduct', [CheckLogoutMiddleware::class, checkAdminRoleMiddleware::class]);
$router->get('/delete-product/{param}', 'AdminController@deleteProduct', [CheckLogoutMiddleware::class, checkAdminRoleMiddleware::class]);
$router->get('/manage-suppliers', 'AdminController@manageSuppliers', [CheckLogoutMiddleware::class, checkAdminRoleMiddleware::class]);
$router->get('/edit-supplier', 'AdminController@editSupplier', [CheckLogoutMiddleware::class, checkAdminRoleMiddleware::class]);
$router->post('/edit-supplier', 'AdminController@editSupplier', [CheckLogoutMiddleware::class, checkAdminRoleMiddleware::class]);
$router->get('/delete-supplier/{param}', 'AdminController@deleteSupplier', [CheckLogoutMiddleware::class, checkAdminRoleMiddleware::class]);





try {
    // Resolve the route
    $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
