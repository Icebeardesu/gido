<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý khách hàng</title>

    <!-- Bootstrap (nếu m đã có rồi thì bỏ dòng này cũng được) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f1f3f5;
            font-size: 14px;
            color: #212529;
        }

        main {
            min-height: 100vh;
        }

        /* Page title */
        .page-title h3 {
            font-size: 20px;
            font-weight: 600;
            margin: 0;
        }

        /* Card */
        .card {
            border-radius: 8px;
            border: 1px solid #dee2e6;
            background: #fff;
        }

        .card-header {
            background: #ffffff;
            border-bottom: 1px solid #dee2e6;
            padding: 12px 16px;
        }

        .card-header h5 {
            font-size: 16px;
            font-weight: 600;
            margin: 0;
        }

        .card-header .btn {
            font-size: 13px;
            padding: 6px 14px;
            border-radius: 4px;
        }

        /* Table */
        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background-color: #f8f9fa;
            font-weight: 600;
            text-align: center;
            vertical-align: middle;
            border-bottom: 1px solid #dee2e6;
        }

        .table tbody td {
            text-align: center;
            vertical-align: middle;
            height: 52px;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        /* Avatar (nếu sau này có img) */
        .table td img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }

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
        <a class="nav-link active" href="admin.php?pageAdmin=userControl">
          <i class="bi bi-people me-1"></i> Quản lý người dùng
        </a>
      </li>

    </ul>
  </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <main class="col-12 p-4">

            <!-- Page Title -->
            <div class="page-title mb-3">
                <h3>Quản lý người dùng</h3>
            </div>

            <div class="card">

                <!-- Header -->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Danh sách người dùng</h5>

                    <a href="admin.php?pageAdmin=addUserForm" class="btn btn-primary btn-sm">
                        Thêm người dùng
                    </a>
                </div>

                <!-- Body -->
                <div class="card-body p-0">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Vai trò</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($user as $client): ?>
                                <tr>
                                    <!-- ID -->
                                    <td class="text-center fw-semibold">
                                        <?php echo $client['id_nguoi_dung']; ?>
                                    </td>

                                    <!-- Tên khách hàng -->
                                    <td>
                                        <?php echo htmlspecialchars($client['ten_nguoi_dung']); ?>
                                    </td>

                                    <!-- Email -->
                                    <td>
                                        <?php echo htmlspecialchars($client['email']); ?>
                                    </td>

                                    <!-- Số điện thoại -->
                                    <td>
                                        <?php echo $client['so_dien_thoai']; ?>
                                    </td>

                                    <!-- Vai trò -->
                                    <td>
                                        <?php
                                            $roles = [
                                                0 => 'Khách hàng',
                                                1 => 'Nhân viên',
                                                2 => 'Admin'
                                            ];
                                            echo $roles[$client['vai_tro']] ?? 'Không xác định';
                                        ?>
                                    </td>

                                    <!-- Hành động -->
                                    <td class="text-center">
                                        <a href="admin.php?pageAdmin=editUserForm&idAdmin=<?php echo $client['id_nguoi_dung']; ?>" 
                                        class="btn btn-sm btn-warning me-1">
                                            Sửa
                                        </a>

                                        <a href="admin.php?pageAdmin=deleteUser&idAdmin=<?php echo $client['id_nguoi_dung']; ?>" 
                                        onclick="return confirm('Bạn có chắc muốn xóa?')" 
                                        class="btn btn-sm btn-danger">
                                            Xóa
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>

            </div>

        </main>
    </div>
</div>

</body>
</html>
