<?php
session_start();
require_once "admin/controllers/controller.php";
$controllerAdmin = new controllerAdmin();

$pageAdmin = $_GET['pageAdmin'] ?? 'loginAdmin';
$idAdmin = $_GET['idAdmin'] ?? null;

$publicPages = ['loginAdmin', 'loginAdminFunction'];

if (!isset($_SESSION['admin']) && !in_array($pageAdmin, $publicPages)) {
    header('Location: admin.php');
    exit;
}
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
    case 'userControl':
        $controllerAdmin->userControl();
        break;
    case 'addUserForm':
        $controllerAdmin->addUserForm();
        break;
    case "addUser":
        $controllerAdmin->addUser();
        break;
    case "deleteUser":
        $controllerAdmin->deleteUser($idAdmin);
        break;
    case "editUserForm":
        $controllerAdmin->editUserForm($idAdmin);
        break;
    case "editUser":
        $controllerAdmin->editUser($idAdmin);
        break;
    case "loginAdminFunction":
        $controllerAdmin->loginAdmin();
        break;
    case "logoutAdmin":
        $controllerAdmin->logoutAdmin();
        break;
    default:
    echo "lỗi 404 - không tìm thấy trang này!";
    break;
    
}
?>
