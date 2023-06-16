<?php
namespace app;

use app\controllers\ProductController;
use app\Database;
use app\Router;

require_once __DIR__.'../../vendor/autoload.php';

$database = new Database;
$router = new Router($database);

$router->get('/', [ProductController::class, 'index']);
$router->get('/products/create', [ProductController::class, 'create']);
$router->post('/products/create', [ProductController::class, 'create']);
$router->post('/products/delete', [ProductController::class, 'delete']);

$router->resolve();