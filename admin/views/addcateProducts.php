<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Thêm danh mục</h5>
                </div>

                <div class="card-body">
                    <form action="admin.php?pageAdmin=addcateProducts" method="POST" enctype="multipart/form-data">

                        <!-- Tên danh mục -->
                        <div class="mb-3">
                            <label for="ten_danh_muc" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" id="ten_danh_muc" name="ten_danh_muc" placeholder="Nhập tên danh mục..." required>
                        </div>

                        <!-- Ảnh đại diện -->
                        <div class="mb-3">
                            <label for="anh_dai_dien" class="form-label">Ảnh đại diện</label>
                            <input type="file" class="form-control" id="anh_dai_dien" name="anh_dai_dien">
                        </div>

                        <!-- Nút -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success px-4">Thêm danh mục</button>
                            <a href="admin.php?pageAdmin=cateProducts" class="btn btn-secondary px-4">Quay lại</a>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
