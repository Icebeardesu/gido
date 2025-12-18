<?php

class controller {
    private $model;
    public function __construct(){
        require_once "./models/model.php";
        $this->model = new database();
    }

    public function home(){
        $products = $this->model->getAll();
        $category= $this->model->getAllCategories();
        $products = $this->model->getAll();
        // $topSelling = $this->model->getTopselling(1);
        include "./views/header-main-without-home.php";
        include "./views/main-content-home.php";
        include "./views/footer.php";
    }

    public function shop(){
        $page = "shop";
        $products = $this->model->getAll();
        $category= $this->model->getAllCategories();
        include "./views/header-main-without-home.php";
        include "./views/main-content-shop.php";
        include "./views/footer.php";
    }
    public function addtocart() {
        $id = $_GET['id'] ?? null;
        if (!$id) return;

        $product = $this->model->getProductById($id);
        if (!$product) return;

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (!isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = [
                'id_san_pham' => $product['id_san_pham'],
                'ten_san_pham' => $product['ten_san_pham'],
                'gia' => $product['gia'],
                'anh' => $product['anh'],
                'quantity' => 1
            ];
        } else {
            $_SESSION['cart'][$id]['quantity']++;
        }

        header("Location: index.php?page=shoppingcart");
        exit;
    }

    public function shoppingcart() {
        $products = $_SESSION['cart'] ?? [];
        include "./views/header-main-without-home.php";
        include "./views/shoppingcart.php";
        include "./views/footer.php";
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id && isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
        header("Location: index.php?page=shoppingcart");
        exit;
    }

    public function update() {
        if (isset($_POST['quantities'])) {
            foreach ($_POST['quantities'] as $id => $qty) {
                if (isset($_SESSION['cart'][$id])) {
                    $_SESSION['cart'][$id]['quantity'] = max(1, (int)$qty);
                }
            }
        }
        header("Location: index.php?page=shoppingcart");
        exit;
    }
    // Trong Controller (file controller.php)
    public function deleteproduct(){
        $id = $_GET['id'] ?? null; 
        
        if ($id !== null) {
            $this->model->deteleProduct($id); 
        }
        
        header('Location: index.php?page=shoppingcart'); 
        exit; 
    }
    public function productdetail(){
        include "./views/productdetail.php";
    }
    public function productcatalog() {
    $id = $_GET['id_danh_muc'] ?? null;
    $products = $this->model->getSanPhamByDanhMuc($id);
    $showCategory = $this->model->showdanhmuc($id);
    $category = $this->model->getAllCategories();
    include "./views/header-main-without-home.php";
    include "./views/productcatalog.php";
    include "./views/footer.php";
    }


    // public function show_category(){
    //     $cate = $this -> model -> getAllCategories();
    // }  

    public function product_detail($id = null){
        if($id === null){
            echo "không có id sản phẩm! ";
            exit;
        }

        $productdetail = $this->model->getProductByID($id);
        
        // Thêm dòng này để debug
        if(!$productdetail){
            echo "Không tìm thấy sản phẩm với ID: " . $id;
            var_dump($productdetail);
            exit;
        }
    
    // Truyền biến vào view
    include "views/header-main-without-home.php";
    include "views/productdetail.php";
    include "views/footer.php";
    }

    public function applyCoupon(){
        if (!isset($_POST['coupon'])) {
            header('Location: index.php?page=shoppingcart');
            exit;
        }

        $code = strtoupper(trim($_POST['coupon']));
        $cartTotal = $_SESSION['cart_total'] ?? 0;

        $coupon = $this->model->getByCode($code, $cartTotal);

        if (!$coupon) {
            $_SESSION['coupon_error'] = 'Mã giảm giá không hợp lệ hoặc không đủ điều kiện';
            header('Location: index.php?page=shoppingcart');
            exit;
        }

        $_SESSION['coupon'] = $coupon;
        unset($_SESSION['coupon_error']);

        header('Location: index.php?page=shoppingcart');
        exit;
    }

    public function removeCoupon()
    {
        unset($_SESSION['coupon']);
        unset($_SESSION['coupon_error']);

        header('Location: index.php?page=shoppingcart');
        exit;
    }

    public function faq(){
        include "./views/header-main-without-home.php";
        include "./views/faq.php";
        include "./views/footer.php";
    }
    public function about(){
        include "./views/header-main-without-home.php";
        include "./views/about.php";
        include "./views/footer.php";
    }
}
?>