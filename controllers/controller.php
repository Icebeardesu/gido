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
        $topSelling = $this->model->getTopselling(1);
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
    public function checkout(): void{
    // lấy giỏ hàng từ session
    $productpayment = $_SESSION['cart'] ?? [];

    // nếu giỏ hàng rỗng → quay về cart
    if (empty($productpayment)) {
        header("Location: index.php?page=cart");
        exit;
    }

    // có thể set phí ship ở đây
    $shippingFee = 0;

    // load view
    include "./views/checkout-page.php";
    include "./views/footer.php";
}


    public function store(): void {
    session_start();

    $cart = $_SESSION['cart'] ?? [];
    if (empty($cart)) {
        header("Location: index.php?page=cart");
        exit;
    }

    try {
        $this->model->beginTransaction();

        // 🔐 Server tự tính subtotal
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['gia'] * $item['quantity'];
        }

        $shipping = $_POST['shipping'] ?? 0;
        $discount = $_POST['discount'] ?? 0;

        $data = [
            'id_nguoi_dung' => $_SESSION['user_id'] ?? 0,
            'customer_name' => $_POST['full_name'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'email' => $_POST['email'] ?? '',
            'address' => $_POST['address'] ?? '',
            'note' => $_POST['note'] ?? '',
            'tong_tien' => $subtotal,
            'phi_giao_hang' => $shipping,
            'giam_gia' => $discount,
            'thanh_toan' => $subtotal + $shipping - $discount,
            'phuong_thuc' => $_POST['payment_method'] ?? 1,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $orderId = $this->model->create($data);

        foreach ($cart as $item) {
            $this->model->insertItem($orderId, $item);
        }

        $this->model->commit();

        unset($_SESSION['cart']);

        header("Location: index.php?page=order_detail&id=$orderId");
        exit;

    } catch (Exception $e) {
        $this->model->rollBack();
        echo "Lỗi đặt hàng: " . $e->getMessage();
        exit;
    }
}


    public function orderProduct(){
        include "./views/checkout-success.php";
    }
    // Hiển thị trang thành công
    public function detail($id)
{
    if (!$id) {
        header('Location: index.php');
        exit();
    }

    $order = $this->model->showHoaDon($id);
    $items = $this->model->getByHoaDon($id);

    // 🔴 QUAN TRỌNG
    if (!$order) {
        echo "<h3>Hóa đơn không tồn tại hoặc đã bị xóa</h3>";
        exit();
    }

    require 'views/checkout-success.php';
}


}
?>