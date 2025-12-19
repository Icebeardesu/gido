<?php
class controllerAdmin {
    private $modelAdmin;
    function __construct()
    {
        require_once "admin/models/model.php";
        $this->modelAdmin = new databaseAdmin();
    }

    public function addProductPage(){
        include "admin/views/addProducts.php";
    }

    public function addProductHandle(){
        $nameP = $_POST['ten'];
        $describe = $_POST['mo_ta'];
        $price = $_POST['gia'];

        $imagePath = null;
        
        if(isset($_FILES['anh']) && $_FILES['anh']['error'] == 0){
            $imagePath = 'assets/uploads/' .$_FILES['anh']['name'];
            move_uploaded_file($_FILES['anh']['tmp_name'], $imagePath);
        }

        $this->modelAdmin->addProducts($nameP, $describe, $price, $imagePath);
        header('location: admin.php?pageAdmin=show_product_control');
    }

    public function deleteFunction($idAdmin){
        if($idAdmin){
            $this->modelAdmin->deleteProducts($idAdmin);
            header("location: admin.php?pageAdmin=show_product_control");
        }
    }
    public function edit_form(){
       $idAdmin = $_GET['idAdmin'];
        $sanpham = $this->modelAdmin->get_sp_by_id($idAdmin);
        require_once "admin/views/edit_form.php";
    }
    public function editFunction($idAdmin){
    $ten_sp = $_POST["ten"];
    $mota_sp = $_POST["mo_ta"];
    $gia_sp = $_POST["gia"];

    // Xử lý ảnh upload
    if (!empty($_FILES['anh']['name'])) {
    $target = "assets/uploads/" . basename($_FILES['anh']['name']);
    move_uploaded_file($_FILES['anh']['tmp_name'], $target);
    $anh_sp = $target;
    } else {
        $anh_sp = $_POST['anh_cu'];
    }

    $ma_sp = $_POST["ma_sp"];

    $this->modelAdmin->update_func($ten_sp,$mota_sp,$gia_sp,$anh_sp,$ma_sp);

    header("Location: admin.php?pageAdmin=show_product_control");
    header("Location: admin.php");
    }
    public function show_p(){
    $products = $this->modelAdmin->getAllProduct();
    ob_start();
    require "admin/views/productControl.php";
}

public function dashboard(){
    $dashboardData = [
        'totalProducts' => $this->modelAdmin->countProducts(),
        'totalCategories' => $this->modelAdmin->countCategories()
    ];

    include "admin/views/dashboard.php";
}


public function cateProducts(){
    $categories = $this->modelAdmin->getAllCategories(); 

    ob_start();
    require "admin/views/cateProducts.php";
}
public function addcateProductsF(){
    include "admin/views/addcateProducts.php";
}
public function addcateProductsHandle(){
    $ten_dm = $_POST['ten_danh_muc'];

    $anh_dai_dien = null;
    
    if(isset($_FILES['anh_dai_dien']) && $_FILES['anh_dai_dien']['error'] == 0){
        $anh_dai_dien = 'assets/uploads/' .$_FILES['anh_dai_dien']['name'];
        move_uploaded_file($_FILES['anh_dai_dien']['tmp_name'], $anh_dai_dien);
    }

    $this->modelAdmin->addCategory($ten_dm, $anh_dai_dien);
    header('location: admin.php?pageAdmin=cateProducts');
    }
public function deleteCategory($id_dm){
    $id_dm = $_GET['id_dm'];
    $this->modelAdmin->deleteCategory($id_dm);
    header("location: admin.php?pageAdmin=cateProducts");
}
public function editCateProductsF(){
    $id_dm = $_GET['id_dm'];
    $category = $this->modelAdmin->getcatebyid($id_dm);
    include "admin/views/edit_cateProducts.php";
}
public function editCateProductsHandle(){
    $id_dm = $_POST['id_danh_muc'];
    $ten_dm = $_POST['ten_danh_muc'];

    // Xử lý ảnh upload
    if (!empty($_FILES['anh_dai_dien']['name'])) {
        $target = "assets/uploads/" . basename($_FILES['anh_dai_dien']['name']);
        move_uploaded_file($_FILES['anh_dai_dien']['tmp_name'], $target);
        $anh_dai_dien = $target;
    } else {
        $anh_dai_dien = $_POST['anh_cu'];
    }

    $this->modelAdmin->updateCate($ten_dm, $anh_dai_dien, $id_dm);
    header("Location: admin.php?pageAdmin=cateProducts");
    }
    // public function customerControl(){
//     $customers = $this->modelAdmin->getAllCustomers();
//     ob_start();
//     require "admin/views/customerControl.php";
//     $content = ob_get_clean();
//     include "admin/views/layout.php";
// }
public function userControl(){
    $user = $this->modelAdmin->listUser();
    ob_start();
    include "admin/views/userControl.php";
}

public function addUserForm(){
    include "admin/views/add_user_form.php";
}

public function addUser(){
    $id = uniqid('USER');
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];
    $role = $_POST['user_role'];

    if($this->modelAdmin->getUserByEmail($email)){
        echo "<script> alert('Email đã tồn tại yêu cầu nhập lại email'); 
            window.location.href = 'admin.php?pageAdmin=addUserForm';</script>";
            return;
    }

    else{
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $this->modelAdmin->addUserFunction($id, $name, $email, $passwordHash, $role);

        header("location: admin.php?pageAdmin=userControl");
    }
}

public function deleteUser($idAdmin){
    if('confirm("Bạn chắc chắn muốn xóa người dùng này chứ?");'){
        $this->modelAdmin->deleteUserFunction($idAdmin);
        header("location: admin.php?pageAdmin=userControl");
    }
}

public function editUserForm($idAdmin){
    $value = $this->modelAdmin->getUserByID($idAdmin);
    include "admin/views/edit_user_form.php";
}

public function editUser($idAdmin){
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $phone = (int)$_POST['phone_number'];
    $role = $_POST['user_role'];

    $this->modelAdmin->editUserFunction($name, $email, $phone, $role, $idAdmin);
    header("location: admin.php?pageAdmin=userControl");
}
private function isSaveSession($admin){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }

        $_SESSION['admin'] = [
            "nameAdmin" => $admin['ten_nguoi_dung'],
            "emailAdmin" => $admin['email'],
            "role" => $admin['vai_tro']
        ];

    }

    public function loginAdminPage(){
        include "admin/views/login.php";
    }

    public function loginAdmin(){
        $email = $_POST['mail'];
        $passAdmin = $_POST['mk'];

        $admin = $this->modelAdmin->getUserByEmail($email);

        if(!$admin){
            echo "<script>
            alert('Email ko tồn tại');
            window.location.href = 'admin.php';
            </script>";
            exit();
        } if(!password_verify($passAdmin, $admin['mat_khau'])){
            echo "<script>
            alert('Sai mật khẩu!');
            window.location.href = 'admin.php';
            </script>";
            exit();
        } 

        if($admin['vai_tro'] != 1 && $admin['vai_tro'] != 2){
            echo "<script>
            alert('Bạn không có quyền truy cập trang này!');
            window.location.href = 'admin.php';
            </script>";
            exit();
        }

        $this->isSaveSession($admin);
    
        echo "<script>
        alert('Đăng nhập thành công!');
        window.location.href = 'admin.php?pageAdmin=dashboard';
        </script>";
        exit();
    }

    public function logoutAdmin(){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }

            session_unset();
            session_destroy();

            header("Location: admin.php");
            exit;
    }
}