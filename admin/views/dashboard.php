<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
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
      border: none;
      border-radius: 18px;
    }

    .welcome-card {
      background: linear-gradient(135deg, #0d6efd, #6ea8fe);
      color: #fff;
    }

    .stat-card {
      background: #fff;
      box-shadow: 0 10px 30px rgba(0,0,0,.08);
    }

    .stat-icon {
      width: 50px;
      height: 50px;
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 22px;
      color: #fff;
    }

    .bg-soft-primary { background: #0d6efd; }
    .bg-soft-success { background: #198754; }
    .bg-soft-warning { background: #ffc107; color:#212529; }
    .bg-soft-danger { background: #dc3545; }
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
        <a class="nav-link active" href="admin.php?pageAdmin=dashboard">
          <i class="bi bi-speedometer2 me-1"></i> Dashboard
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="admin.php?pageAdmin=show_product_control">
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
          <i class="bi bi-people me-1"></i> Quản lý người dùng
        </a>
      </li>

    </ul>
  </div>
</nav>

<div class="container-fluid p-4">

  <div class="card welcome-card shadow-sm mb-4">
    <div class="card-body">
      <h3 class="fw-bold mb-1">👋 Chào mừng quay lại!</h3>
    </div>
  </div>

  <div class="row g-4">
    <div class="col-md-3">
      <div class="card stat-card p-3">
        <div class="d-flex align-items-center">
          <div class="stat-icon bg-soft-primary me-3">
            <i class="bi bi-box"></i>
          </div>
          <div>
            <h6 class="mb-0">Sản phẩm</h6>
            <h4 class="fw-bold"><?= $dashboardData['totalProducts']; ?>
            </h4>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card stat-card p-3">
        <div class="d-flex align-items-center">
          <div class="stat-icon bg-soft-success me-3">
            <i class="bi bi-folder2"></i>
          </div>
          <div>
            <h6 class="mb-0">Danh mục</h6>
            <h4 class="fw-bold"><?= $dashboardData['totalCategories']; ?></h4>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card stat-card p-3">
        <div class="d-flex align-items-center">
          <div class="stat-icon bg-soft-warning me-3">
            <i class="bi bi-people"></i>
          </div>
          <div>
            <h6 class="mb-0">Khách hàng</h6>
            <h4 class="fw-bold">0</h4>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
