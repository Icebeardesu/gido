<div class="container-fluid">
    <div class="row">
        <main class="col-12 p-4">
            <div class="mb-4">
                <h3 class="fw-bold">Quản lý sản phẩm</h3>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">📦 Danh sách sản phẩm</h5>

                    <a href="admin.php?pageAdmin=addProduct" class="btn btn-light btn-sm">
                        ➕ Thêm sản phẩm
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-primary">
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th style="max-width: 250px;">Mô tả</th>
                                    <th>Giá</th>
                                    <th>Ảnh</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>

                            <tbody id="productTable">
                                <?php foreach($products as $p){ ?>
                                <tr>
                                    <td class="text-center fw-semibold"><?php echo $p['id_san_pham'] ?></td>

                                    <td><?php echo $p['ten_san_pham'] ?></td>

                                    <td style="max-width: 250px;" class="text-truncate">
                                        <?php echo $p['mo_ta'] ?>
                                    </td>

                                    <td class="text-danger fw-bold">
                                        <?php echo number_format($p['gia'], 0, ',', '.') ?>₫
                                    </td>

                                    <td class="text-center">
                                        <img src="<?php echo $p['anh'] ?>" width="80"
                                             class="rounded shadow-sm border">
                                    </td>

                                    <td class="text-center">
                                        <a href="admin.php?pageAdmin=edit_form&idAdmin=<?php echo $p['id_san_pham'] ?>"
                                           class="btn btn-warning btn-sm me-1">
                                            ✏️ Sửa
                                        </a>

                                        <a href="admin.php?pageAdmin=deleteFunction&idAdmin=<?php echo $p['id_san_pham'] ?>"
                                           onclick="return confirm('Bạn có chắc muốn xóa?')"
                                           class="btn btn-danger btn-sm">
                                            🗑️ Xóa
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>