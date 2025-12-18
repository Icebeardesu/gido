<?php
require_once "./controllers/controller.php";
session_start();
$controller = new controller();

$page = $_GET['page'] ?? 'home';
$id = $_GET['id'] ?? null;
switch ($page) {
    case 'home':
        $controller->home();
        break;
    case 'shop':
        $controller->shop();
        break;
    case 'shoppingcart':
        $controller->shoppingcart();
        break;
    case 'addtocart':
        $controller->addtocart();
        break;
    case 'editCateProducts':
        $controllerAdmin->editCateProductsF();
        break;
    case 'detele':
        $controller->deleteproduct();
        break;
    case 'productDetail':
        $controller->product_detail($id);
        break;
    case 'productcatalog':
        $controller->productcatalog();
        break;
    case 'delete':
        $controller->delete();
        break;
    case 'update':
        $controller->update();
        break;
    // case "checkout-page":
    //     $controller->show_checkout($id);
    //     break;
    case 'faq':
        $controller->faq();
        break;
    case 'checkout':
        $controller->checkout();
    default:
    echo "lỗi 404 - không tìm thấy trang này!";
    break;
}
?>