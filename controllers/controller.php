<?php

class controller {
    private $model;
    public function __construct(){
        require_once "./models/model.php";
        $this->model = new database();
    }

    public function home(){
        $products = $this->model->getAllhomepage();
        $best_sell_product = $this->model->getAll();
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
    public function show_product(){
        $prod = $this -> model -> getAll();
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
        include "./views/shoppingcart.php";
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
    public function productcatalog(){
        include "./views/productcatalog.php";
    }
    // public function show_category(){
    //     $cate = $this -> model -> getAllCategories();
    // }  

   public function productDetail($id = null){
        if($id === null){
            echo "không có id sản phẩm! ";
            exit;
        }

        $productdetail = $this->model->getProductByID($id);
        
        // Thêm dòng này để debug
    
    // Truyền biến vào view
    include "views/header-main-without-home.php";
    include "views/productdetail.php";
    include "views/footer.php";
    }

    public function order_success() {
    $id = $_GET["id"];
    include "./views/checkout-success.php";
}

    public function show_checkout($id){
        
    }
}

?>