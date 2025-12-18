<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa sản phẩm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-4">

  <div class="container">
    <div class="card shadow-lg p-4 rounded-4" style="max-width: 600px; margin: auto;">
        <a href="admin.php">Quay lại🔙</a>
      <h3 class="text-center mb-4 fw-bold text-primary">Sửa sản phẩm </h3>

      <form method="post" enctype="multipart/form-data" action="admin.php?pageAdmin=editFunction">
        <div class="mb-3">
        <input type="hidden" name="ma_sp" value="<?= htmlspecialchars($sanpham['id_san_pham']) ?>">
          <label class="form-label">Tên sản phẩm</label>
          <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" required name="ten"
          value="<?= htmlspecialchars($sanpham['ten_san_pham']) ?>" >
        </div>

        <div class="mb-3">
          <label class="form-label">Mô tả</label>
          <input type="text" class="form-control" placeholder="Nhập mô tả" required name="mo_ta"
          value="<?= htmlspecialchars($sanpham['mo_ta']) ?>" >
        </div>

        <div class="mb-3">
          <label class="form-label">Giá</label>
          <input type="number" class="form-control" placeholder="Nhập giá" required name="gia"
          value="<?= htmlspecialchars($sanpham['gia']) ?>" >
        </div>

        <div class="mb-3">
            <input type="hidden" name="anh_cu" value="<?= htmlspecialchars($sanpham['anh']) ?>">
            <label class="form-label">Ảnh sản phẩm hiện tại</label><br>
            <img src="<?= htmlspecialchars($sanpham['anh']) ?>" 
                alt="Ảnh sản phẩm" 
                style="max-width:150px; border:1px solid #ccc; border-radius:8px;">
        </div>
        <div class="mb-3">
            <label class="form-label">Chọn ảnh mới</label>
            <input type="file" class="form-control" accept="image/*" name="anh">
        </div>
        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Cập nhập sản phẩm</button>
      </form>
    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
