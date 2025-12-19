<?php
class database {
    public $conn;
    public function __construct(){
        $host = "localhost";
        $dbname = "ignitefoot";
        $user = "root";
        $pass = "";

        try{
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        }catch(PDOException $e){
            error_log($e->getMessage());
            die("Lỗi không khởi chạy được cơ sở dữ liệu vui lòng liên hệ với admin");
        }
    }
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM san_pham");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductById( $id) {
        $stmt = $this->conn->prepare("SELECT * FROM san_pham WHERE id_san_pham = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function getTopselling( $ishot=1) {
        $stmt = $this->conn->prepare("SELECT * FROM san_pham WHERE is_hot = ?");
        $stmt->execute([$ishot]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function deteleProduct( $id) {
        $stmt = $this->conn->prepare("SELECT * FROM san_pham WHERE id_san_pham = ?");
        $stmt->execute([$id]);
    }
    // SanPhamModel.php
     public function getSanPhamByDanhMuc($idDanhMuc) {
        $stmt = $this->conn->prepare("SELECT * FROM san_pham WHERE id_danh_muc = ?"
        );
        $stmt->execute([$idDanhMuc]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllCategories() {
        $stmt = $this->conn->prepare("SELECT * FROM danh_muc");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        public function showdanhmuc($id) {
            $stmt = $this->conn->prepare("SELECT * FROM danh_muc WHERE id_danh_muc = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    public function getByCode($code, $cartTotal){
        $sql = "SELECT * FROM ma_giam_gia
                WHERE code = ?
                AND trang_thai = 1
                AND ngay_bat_dau <= CURDATE()
                AND ngay_ket_thuc >= CURDATE()
                AND don_hang_toi_thieu <= ?
                AND so_lan_da_dung < so_lan_su_dung
                LIMIT 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$code, $cartTotal]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
        public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO hoa_don (id_nguoi_dung, tong_tien, phi_giao_hang, giam_gia, thanh_toan, phuong_thuc, customer_name, phone, email, address, note, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $data['id_nguoi_dung'],
            $data['tong_tien'],
            $data['phi_giao_hang'],
            $data['giam_gia'],
            $data['thanh_toan'],
            $data['phuong_thuc'],
            $data['customer_name'],
            $data['phone'],
            $data['email'],
            $data['address'],
            $data['note'],
            'Đang xử lý'
        ]);
        return $this->conn->lastInsertId();
    }

    // Lưu chi tiết sản phẩm
    public function insertItem($orderId, $item) {
        $stmt = $this->conn->prepare("INSERT INTO chi_tiet_hoa_don (id_hoa_don, id_san_pham, ten_san_pham, gia, so_luong) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            $orderId,
            $item['id_san_pham'],
            $item['ten_san_pham'],
            $item['gia'],
            $item['quantity']
        ]);
    }

    // Lấy thông tin hóa đơn theo ID
    public function showHoaDon($id) {
        $stmt = $this->conn->prepare("SELECT * FROM hoa_don WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Lấy chi tiết sản phẩm theo hóa đơn
    public function getByHoaDon($id) {
        $stmt = $this->conn->prepare("SELECT * FROM chi_tiet_hoa_don WHERE id_hoa_don = ?");
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function beginTransaction() {
        $this->conn->beginTransaction();
    }

    // 🔹 LƯU THAY ĐỔI
    public function commit() {
        $this->conn->commit();
    }

    // 🔹 HOÀN TÁC
    public function rollBack() {
        $this->conn->rollBack();
    }
}
?>