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
$router->get('/',[App\Controllers\HomeController::class,'home']);

$router->get('admin/user/list',[App\Controllers\UserController::class,'userSelect']);
$router->get('admin/user/del/{id}',[App\Controllers\UserController::class,'UserDel']);
$router->get('admin/user/store',[App\Controllers\UserController::class,'Store']);
$router->post('admin/user/create',[App\Controllers\UserController::class,'Create']);
// login  
$router->get('account/login',[App\Controllers\UserController::class,'toLogin']);
$router->post('account/dangnhap',[App\Controllers\UserController::class,'login']);
$router->get('account/register',[App\Controllers\UserController::class,'register']);
// account 
$router->post('admin/user/edit/{id}',[App\Controllers\UserController::class,'editUser']);
$router->get('admin/user/detail/{id}',[App\Controllers\UserController::class,'detailUser']);


// router specialty 
$router->get('admin/specialty/store',[App\Controllers\SpecialtyController::class,'Store']);
$router->post('admin/specialty/create',[App\Controllers\SpecialtyController::class,'Create']);
$router->get('admin/specialty/list',[App\Controllers\SpecialtyController::class,'speSlt']);
$router->post('admin/specialty/hide/{specialty_id}',[App\Controllers\SpecialtyController::class,'hide']);
$router->post('admin/specialty/show/{specialty_id}',[App\Controllers\SpecialtyController::class,'show']);
$router->get('admin/specialty/edit/{specialty_id}',[App\Controllers\SpecialtyController::class,'Edit']);
$router->post('admin/specialty/update/{specialty_id}',[App\Controllers\SpecialtyController::class,'Update']);


// booking route 
$router->get('admin/booking/list',[App\Controllers\BookingController::class,'index']);

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