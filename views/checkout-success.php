<div class="checkout-success container">
    <h4>Mã đơn hàng: <?= htmlspecialchars($order['id']) ?></h4>
    <p>Khách hàng: <?= htmlspecialchars($order['customer_name']) ?></p>
    <p>Điện thoại: <?= htmlspecialchars($order['phone']) ?></p>
    <p>Email: <?= htmlspecialchars($order['email']) ?></p>
    <p>Địa chỉ: <?= htmlspecialchars($order['address']) ?></p>
    <p>Ghi chú: <?= htmlspecialchars($order['note']) ?></p>
    <p>Phương thức: <?= $order['phuong_thuc'] == 1 ? 'Tiền mặt' : 'Chuyển khoản' ?></p>
    <p>Trạng thái: <?= htmlspecialchars($order['status']) ?></p>

    <h4>Chi tiết sản phẩm</h4>
    <table>
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $total = 0;
        foreach($items as $item):
            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;
        ?>
            <tr>
                <td><?= htmlspecialchars($item['ten_san_pham']) ?></td>
                <td><?= number_format($item['price']) ?>₫</td>
                <td><?= $item['quantity'] ?></td>
                <td><?= number_format($subtotal) ?>₫</td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Tổng đơn hàng:</th>
                <th><?= number_format($total) ?>₫</th>
            </tr>
        </tfoot>
    </table>

    <a href="index.php" class="btn btn-primary">Tiếp tục mua sắm</a>
</div>
