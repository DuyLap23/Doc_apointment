<?php
use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
   

});

$router->get('admin/user/list',[App\Controllers\UserController::class,'userSelect']);
$router->get('admin/user/del/{id}',[App\Controllers\UserController::class,'UserDel']);
$router->get('/',[App\Controllers\HomeController::class,'home']);

// khu vực cần quan tâm -----------
// bắt đầu định nghĩa ra các đường dẫn
// $router->get('/', [App\Controllers\BaseController::class,'home']);
//định nghĩa đường dẫn trỏ đến Product Controller
// $router->get('list-product',[App\Controllers\ProductController::class,'index']);
// $router->get('add-product',[App\Controllers\ProductController::class,'addProduct']);
// $router->get('delete-product/{id_product}',[App\Controllers\ProductController::class,'delProduct']);
// $router->post('post-product',[App\Controllers\ProductController::class,'postProduct']);
// $router->post('edit-product/{id_product}',[App\Controllers\ProductController::class,'editProduct']);
// $router->get('detail-product/{id_product}',[App\Controllers\ProductController::class,'detail']);

// $router->post('edit-product/{id}',[App\Controller\ProductController::class,'editProduct']);
// khu vực cần quan tâm -----------
//$router->get('test', [App\Controllers\ProductController::class, 'index']);

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>