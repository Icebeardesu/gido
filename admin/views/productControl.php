<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Quản lý sản phẩm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #f5f7fa, #e4ecf7);
      font-family: 'Segoe UI', system-ui, sans-serif;
    }

    .admin-navbar {
      background: linear-gradient(90deg, #0d6efd, #0b5ed7);
      box-shadow: 0 4px 20px rgba(0,0,0,.12);
    }

    .admin-navbar .nav-link {
      color: rgba(255,255,255,.9) !important;
      font-weight: 500;
      padding: 10px 16px;
      border-radius: 8px;
      margin-right: 6px;
      transition: .2s;
    }

    .admin-navbar .nav-link:hover,
    .admin-navbar .nav-link.active {
      background: rgba(255,255,255,.2);
      color: #fff !important;
    }

    .card {
      border-radius: 18px;
      border: none;
    }

    .table th,
    .table td {
      vertical-align: middle !important;
    }

    .product-img {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 14px;
      display: block;
      margin: auto;
    }

    .text-limit {
      max-width: 260px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
  </style>
</head>

<body>

<nav class="navbar navbar-expand-lg admin-navbar px-4">
  <a class="navbar-brand text-white fw-bold" href="admin.php?pageAdmin=dashboard">
    ⚙️ Admin Panel
  </a>

  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminMenu">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="adminMenu">
    <ul class="navbar-nav ms-4">

      <li class="nav-item">
        <a class="nav-link" href="admin.php?pageAdmin=dashboard">
          <i class="bi bi-speedometer2 me-1"></i> Dashboard
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link active" href="admin.php?pageAdmin=show_product_control">
          <i class="bi bi-box-seam me-1"></i> Quản lý sản phẩm
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="admin.php?pageAdmin=cateProducts">
          <i class="bi bi-folder2-open me-1"></i> Quản lý danh mục
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="admin.php?pageAdmin=userControl">
          <i class="bi bi-people me-1"></i> Quản lý khách hàng
        </a>
      </li>

    </ul>
  </div>
</nav>

<div class="container-fluid p-4">

  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">📦 Quản lý sản phẩm</h3>

    <a href="admin.php?pageAdmin=addProduct" class="btn btn-primary rounded-pill px-4">
      <i class="bi bi-plus-circle me-1"></i> Thêm sản phẩm
    </a>
  </div>

  <div class="card shadow-lg">
    <div class="card-body">

      <h5 class="fw-semibold mb-3">Danh sách sản phẩm</h5>

      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead class="table-light">
            <tr class="text-center">
              <th>ID</th>
              <th class="text-start">Tên sản phẩm</th>
              <th class="text-start">Mô tả</th>
              <th>Giá</th>
              <th>Ảnh</th>
              <th>Hành động</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($products as $p) { ?>
            <tr>

              <td class="text-center fw-semibold">
                <?php echo $p['id_san_pham']; ?>
              </td>

              <td class="fw-semibold">
                <?php echo $p['ten_san_pham']; ?>
              </td>

              <td class="text-muted">
                <div class="text-limit">
                  <?php echo $p['mo_ta']; ?>
                </div>
              </td>

              <td class="text-center fw-bold text-danger">
                <?php echo number_format($p['gia'],0,',','.'); ?>₫
              </td>

              <td class="text-center">
                <img src="<?php echo $p['anh']; ?>" class="product-img shadow-sm">
              </td>

              <td class="text-center">
                <a href="admin.php?pageAdmin=edit_form&idAdmin=<?php echo $p['id_san_pham']; ?>"
                   class="btn btn-outline-warning btn-sm me-1">
                  <i class="bi bi-pencil-square"></i>
                </a>

                <a href="admin.php?pageAdmin=deleteFunction&idAdmin=<?php echo $p['id_san_pham']; ?>"
                   onclick="return confirm('Bạn có chắc muốn xóa?')"
                   class="btn btn-outline-danger btn-sm">
                  <i class="bi bi-trash"></i>
                </a>
              </td>

            </tr>
            <?php } ?>
          </tbody>

        </table>
      </div>

    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
