<?php
require_once "admin/controllers/controller.php";
$controllerAdmin = new controllerAdmin();

$pageAdmin = $_GET['pageAdmin'] ?? 'dashboard';
$idAdmin = $_GET['idAdmin'] ?? null;
switch ($pageAdmin) {
    case 'loginAdmin':
        $controllerAdmin->loginAdminPage();
        break;

    case 'dashboard':
        $controllerAdmin->dashboard();
        break;

    case 'addProduct':
        $controllerAdmin->addProductPage();
        break;

    case 'addNewProduct':
        $controllerAdmin->addProductHandle();
        break;

    case 'deleteFunction':
        $controllerAdmin->deleteFunction($idAdmin);
        break;
    case 'edit_form':
        $controllerAdmin->edit_form();
        break;
    case 'editFunction':
        $controllerAdmin->editFunction($idAdmin);
        break;
    case 'show_product_control':
        $controllerAdmin->show_p();
        break;
    case 'cateProducts':
        $controllerAdmin->cateProducts();
        break;
    case 'addcateProductsF':
        $controllerAdmin->addcateProductsF();
        break;
    case 'addcateProducts':
        $controllerAdmin->addcateProductsHandle();
        break;
    case 'deleteCategory':
        $controllerAdmin->deleteCategory($id_dm);
        break;
    case 'editCateProducts':
        $controllerAdmin->editCateProductsF();
        break;
    case 'edit_cateProducts':
        $controllerAdmin->editCateProductsHandle();
        break;
    default:
    echo "lỗi 404 - không tìm thấy trang này!";
    break;
    
}
?>
