<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý khách hàng</title>

    <!-- Bootstrap (nếu m đã có rồi thì bỏ dòng này cũng được) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
    </style>
</head>
<body>

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
