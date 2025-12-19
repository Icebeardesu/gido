<style>
.checkout-success {
    max-width: 950px;
    margin: 40px auto;
    padding: 30px;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    font-family: Arial, sans-serif;
}

/* ===== TIÊU ĐỀ ===== */
.order-success-title {
    text-align: center;
    margin-bottom: 30px;
}

.order-success-title h2 {
    color: #28a745;
    margin-bottom: 8px;
}

.order-success-title p {
    color: #666;
    font-size: 15px;
}

/* ===== INFO ===== */
.checkout-success h4 {
    margin-top: 25px;
    margin-bottom: 15px;
    color: #222;
}

.checkout-success p {
    margin: 6px 0;
    color: #444;
}

/* ===== TABLE ===== */
.checkout-success table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.checkout-success th,
.checkout-success td {
    padding: 12px;
    border-bottom: 1px solid #e5e5e5;
    text-align: center;
    vertical-align: middle;
}

.checkout-success th {
    background: #f8f9fa;
    font-weight: 600;
}

.checkout-success td:first-child {
    text-align: left;
}

.checkout-success tfoot th {
    background: #f1f1f1;
    font-size: 16px;
    color: #000;
}

/* ===== IMAGE ===== */
.product-img {
    width: 70px;
    height: 70px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #ddd;
}

/* ===== BUTTON ===== */
.checkout-success .btn {
    display: inline-block;
    margin-top: 25px;
    padding: 12px 30px;
    background: #0d6efd;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    transition: 0.3s;
}

.checkout-success .btn:hover {
    background: #084298;
}
</style>

<div class="checkout-success container">

    <!-- ✅ TIÊU ĐỀ -->
    <div class="order-success-title">
        <h2>🎉 Đặt hàng thành công!</h2>
        <p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi</p>
    </div>

    <!-- ✅ THÔNG TIN ĐƠN -->
    <h4>Mã đơn hàng: <?= htmlspecialchars($order['id']) ?></h4>
    <p>
    <strong>Ngày đặt:</strong>
    <?= !empty($order['created_at']) 
        ? date('d/m/Y H:i', strtotime($order['created_at'])) 
        : '---' ?>
</p>

    <p><strong>Khách hàng:</strong> <?= htmlspecialchars($order['customer_name']) ?></p>
    <p><strong>Điện thoại:</strong> <?= htmlspecialchars($order['phone']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($order['email']) ?></p>
    <p><strong>Địa chỉ:</strong> <?= htmlspecialchars($order['address']) ?></p>
    <p><strong>Ghi chú:</strong> <?= htmlspecialchars($order['note']) ?></p>
    <p><strong>Phương thức:</strong> <?= $order['phuong_thuc'] == 1 ? 'Tiền mặt' : 'Chuyển khoản' ?></p>
    <p><strong>Trạng thái:</strong> <?= htmlspecialchars($order['status']) ?></p>

    <!-- ✅ CHI TIẾT SẢN PHẨM -->
    <h4>Chi tiết sản phẩm</h4>
    <table>
        <thead>
            <tr>
                <th>Ảnh</th>
                <th>Sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $total = 0;
            foreach ($items as $item):
                $subtotal = $item['gia'] * $item['so_luong'];
                $total += $subtotal;
        ?>
            <tr>
                <td>
                    <img 
                        src="assets/image/products/<?= htmlspecialchars($item['anh'] ?? 'no-image.png') ?>"
                        class="product-img"
                        alt="<?= htmlspecialchars($item['ten_san_pham']) ?>"
                    >
                </td>
                <td><?= htmlspecialchars($item['ten_san_pham']) ?></td>
                <td><?= number_format($item['gia']) ?>₫</td>
                <td><?= $item['so_luong'] ?></td>
                <td><?= number_format($subtotal) ?>₫</td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">Tổng đơn hàng:</th>
                <th><?= number_format($total) ?>₫</th>
            </tr>
        </tfoot>
    </table>

    <a href="index.php" class="btn btn-primary">Tiếp tục mua sắm</a>
</div>
