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
    public function deteleProduct( $id) {
        $stmt = $this->conn->prepare("SELECT * FROM san_pham WHERE id_san_pham = ?");
        $stmt->execute([$id]);
    }
    // SanPhamModel.php
     public function getSanPhamByDanhMuc($idDanhMuc) {
        $stmt = $this->conn->prepare(
            "SELECT * FROM san_pham WHERE id_danh_muc = ?"
        );
        $stmt->execute([$idDanhMuc]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllCategories() {
        $stmt = $this->conn->prepare("SELECT * FROM danh_muc");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getByCode($code){
        $sql = "SELECT * FROM ma_giam_gia 
                WHERE code = ?
                AND trang_thai = 1
                AND ngay_bat_dau <= CURDATE()
                AND ngay_ket_thuc >= CURDATE()
                LIMIT 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$code]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>