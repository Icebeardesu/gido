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
    case 'productdetail':
        $controller->productdetail();
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
    case 'apply-coupon':
        $controller->applyCoupon();
        break;
    case 'remove-coupon':
        $controller->removeCoupon();
        break;
    case 'faq':
        $controller->faq();
        break;
    case 'checkout':
        $controller->checkout();
        break;
    case 'order_success':
        $controller->orderProduct();
        break;
    case 'store':              // Khi form gửi về đây
        $controller->store();
        break;
    case 'order_success':
        $id = $_GET['id'] ?? null;
        if($id) {
            $controller->detail($id);
        } else {
            header('Location: index.php');
        }
    break;
    default:
    echo "lỗi 404 - không tìm thấy trang này!";
    break;
}
?>