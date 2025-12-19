<?php
class databaseAdmin {
    public $conn;
    public function __construct(){
        $host = "localhost";
        $dbname = "igniteFoot";
        $user = "root";
        $pass = "";

        try{
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        }catch(PDOException $e){
            error_log($e->getMessage());
            die("Lỗi không khởi chạy được cơ sở dữ liệu vui lòng kiểm tra lại kết nối!");
        }
    }

    public function getAllProduct(){
        $stmt = $this->conn->prepare("select * from san_pham");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_sp_by_id($idAdmin) {
        $stmt = $this->conn->prepare("SELECT * FROM san_pham where id_san_pham=?");
        $stmt->execute([$idAdmin]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addProducts($nameP, $describe, $price, $imagePath){
        $stmt = $this->conn->prepare("insert into san_pham (ten_san_pham, mo_ta, gia, anh) values (?,?,?,?)");
        return $stmt->execute([$nameP, $describe, $price, $imagePath]);
    }

    public function deleteProducts($idAdmin){
        $stmt = $this->conn->prepare("delete from san_pham where id_san_pham = :id");
        return $stmt->execute([":id" => $idAdmin]);
    }

    public function update_func($ten_sp,$mota_sp,$gia_sp,$anh_sp,$ma_sp){
    $pdo = $this->conn->prepare("UPDATE san_pham 
                                 SET ten_san_pham= ?, mo_ta = ?, gia = ?, anh= ? 
                                 WHERE id_san_pham=?");
    $pdo->execute([$ten_sp, $mota_sp, $gia_sp, $anh_sp, $ma_sp]);
    }
    public function getAllCategories(){
        $stmt = $this->conn->prepare("select * from danh_muc");
            $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addCategory($ten_dm, $anh_dai_dien){
        $stmt = $this->conn->prepare("insert into danh_muc (ten_danh_muc, anh_dai_dien) values (?,?)");
        return $stmt->execute([$ten_dm, $anh_dai_dien]);
    }
    public function deleteCategory($id_dm){
        $stmt = $this->conn->prepare("delete from danh_muc where id_danh_muc = :id");
        return $stmt->execute([":id" => $id_dm]);
    }
    public function getcatebyid($id_dm){
        $stmt = $this->conn->prepare("SELECT * FROM danh_muc where id_danh_muc=?");
        $stmt->execute([$id_dm]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateCate($ten_dm, $anh_dai_dien, $id_dm){
        $pdo = $this->conn->prepare("UPDATE danh_muc 
                                     SET ten_danh_muc= ?, anh_dai_dien = ? 
                                     WHERE id_danh_muc=?");
        $pdo->execute([$ten_dm, $anh_dai_dien, $id_dm]);
    }
    public function countProducts(){
        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM san_pham");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];    
    }
    public function countCategories(){
        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM danh_muc");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    public function getUserByEmail($email){
    $stmt = $this->conn->prepare(
        "SELECT * FROM nguoi_dung WHERE email = ? LIMIT 1"
    );
    $stmt->execute([$email]);
    return $stmt->fetch();
    }

    public function listUser(){
        $stmt = $this->conn->prepare("SELECT * FROM nguoi_dung");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUserFunction($id, $name, $email, $passwordHash, $role){
        $stmt = $this->conn->prepare('INSERT INTO nguoi_dung (id_nguoi_dung, ten_nguoi_dung, email, mat_khau, vai_tro) VALUES (?, ?, ?, ?, ?)');
        return $stmt->execute([$id, $name, $email, $passwordHash, $role]);
    }

    public function deleteUserFunction($idAdmin){
        $stmt = $this->conn->prepare('delete from nguoi_dung where id_nguoi_dung = :id');
        return $stmt->execute([":id" => $idAdmin]);
    }

    public function editUserFunction($name, $email, $phone, $role, $idAdmin){
        $stmt = $this->conn->prepare('update nguoi_dung set ten_nguoi_dung = ?, email = ?, so_dien_thoai = ?, vai_tro = ? where id_nguoi_dung = ?');
        return $stmt->execute([$name, $email, $phone, $role, $idAdmin]);
    }

    public function getUserByID($idAdmin){
        $stmt = $this->conn->prepare('select * from nguoi_dung where id_nguoi_dung = :id');
        $stmt->execute([":id" => $idAdmin]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>