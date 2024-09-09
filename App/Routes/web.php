<?php
use App\Controllers\ProductController;
$controller = new ProductController;


$uri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if($uri === '/' && $requestMethod === 'GET'){
    $controller->viewProducts();
}elseif($uri === '/addproduct' && $requestMethod === 'GET'){
    $controller->showAddProductPage();
}elseif($uri === '/viewproducts' && $requestMethod === 'GET'){
    $controller->viewProducts();
}elseif($uri === '/save' && $requestMethod == 'POST'){
    $controller->saveProduct();
}elseif($uri === '/deleteproducts' && $requestMethod === 'POST'){
    $controller->deleteProducts();
}else{
    $controller->showErrorPage();
}
