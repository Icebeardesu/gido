
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Swiper css link -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!-- Fancybox css link -->
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
    <!-- Animation css link -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="assets/css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Boxicon css link -->
    <link rel="stylesheet" href="assets/css/boxicons.min.css">
    <!-- My css link -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Ethics - Fashion Shop HTML Template</title>
    <link rel="icon" href="assets/image/thumbnail.svg" type="image/gif" sizes="20x20">
</head>
<body>
    <!-- Back To Top -->
    <div class="progress-wrap">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
		</svg>
        <svg aria-hidden="true" class="arrow" width="16px" height="16px" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
            <path d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z">
            </path>
        </svg>
	</div>
    <!-- Start Cart Page -->
     <?php
        $grandTotal = 0;

        if (!empty($products)) {
            foreach ($products as $item) {
                $grandTotal += $item['gia'] * $item['quantity'];
            }
        }

        $shipping = 0;        // Free ship
        $pickupFee = 10000;  // Nếu có
        $total = $grandTotal + $shipping; // hoặc + $pickupFee
    ?>
    <div class="cart-page mb-100">
        <div class="container-lg container-fluid">
            <div class="row g-lg-4 gy-5">
                <div class="col-xl-8 col-lg-7">
                    <div class="cart-shopping-wrapper">
                        <div class="cart-widget-title">
                            <h4>My Shopping</h4>
                        </div>
                        <?php if(empty($products)): ?>
                            <p>Giỏ hàng trống</p>
                        <?php else: ?>
                        <form method="post" action="index.php?page=update">
                        <table border="1" cellpadding="10">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $grandTotal = 0;
                                foreach($products as $item): 
                                    $lineTotal = $item['gia'] * $item['quantity'];
                                    $grandTotal += $lineTotal;
                                ?>
                                <tr>
                                    <td><img src="assets/image/products/<?= $item['anh'] ?>" width="50"></td>
                                    <td><?= $item['ten_san_pham'] ?></td>
                                    <td><?= number_format($item['gia'],0,',','.') ?> VNĐ</td>
                                    <td>
                                        <input type="number" name="quantities[<?= $item['id_san_pham'] ?>]" value="<?= $item['quantity'] ?>" min="1">
                                    </td>
                                    <td><?= number_format($lineTotal,0,',','.') ?> VNĐ</td>
                                    <td><a href="index.php?page=delete&id=<?= $item['id_san_pham'] ?> " onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');">Xóa</a></td>
                                </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="4">Tổng cộng</td>
                                    <td colspan="2"><?= number_format($grandTotal,0,',','.') ?> VNĐ</td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit">Cập nhật số lượng</button>
                        </form>
                        <?php endif; ?>
                        <a href="index.php?page=shop">Tiếp tục mua hàng</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 ">
                    <div class="cart-order-sum-area">
                        <div class="cart-widget-title">
                            <h4>Order Summary</h4>
                        </div>

                        <div class="order-summary-wrap">
                            <ul class="order-summary-list">

                                <li>
                                    <strong>Tổng tiền</strong>
                                    <span><?= number_format($grandTotal, 0, ',', '.') ?> VNĐ</span>
                                </li>

                                <li>
                                    <strong>Vận chuyển</strong>
                                    <div class="order-info">
                                        <p>Shipping Free*</p>
                                        <span>Pickup fee <?= number_format($pickupFee,0,',','.') ?> VNĐ</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="coupon-area">
                                        <strong>Mã giảm giá</strong>
                                        <form method="post">
                                            <div class="form-inner">
                                                <input type="text" name="coupon" placeholder="Mã giảm giá...">
                                                <button type="submit" class="apply-btn">Áp dụng</button>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li>
                                    <strong>Total</strong>
                                    <span id="grand-total">
                                        <?= number_format($total, 0, ',', '.') ?> VNĐ
                                    </span>
                                </li>
                            </ul>
                            <a href="index.php?page=checkout" class="primary-btn mt-40">
                                Thanh toán ngay
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <script>
document.addEventListener("click", function (e) {

    let minus = e.target.closest(".quantity__minus");
    let plus  = e.target.closest(".quantity__plus");

    if (!minus && !plus) return;

    e.preventDefault();

    let quantityBox = e.target.closest(".quantity");
    let input = quantityBox.querySelector(".quantity__input");
    let value = parseInt(input.value) || 1;

    if (minus && value > 1) value--;
    if (plus) value++;

    input.value = value;

    // 👉 TOTAL từng sản phẩm
    let row = e.target.closest("tr");
    let totalCell = row.querySelector(".item-total");
    let price = parseInt(totalCell.dataset.price);

    let itemTotal = price * value;
    totalCell.innerText = itemTotal.toLocaleString("vi-VN") + " VNĐ";

    // 👉 cập nhật localStorage
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let id = quantityBox.dataset.id;
    let item = cart.find(p => p.id == id);

    if (item) {
        item.soLuong = value;
        localStorage.setItem("cart", JSON.stringify(cart));
    }

    // 👉 TOTAL toàn bộ giỏ
    calculateTotal();
});

// 👉 gọi khi load trang
calculateTotal();

// TOTAL tất cả SP
function calculateTotal() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let total = 0;

    cart.forEach(item => {
        total += item.gia * item.soLuong;
    });

    document.getElementById("cart-total").innerText =
        total.toLocaleString("vi-VN") + " VNĐ";
}
</script>



    <!-- End Cart Page -->
    <!-- footer section strats here -->
    <!-- footer section end here -->


    <!-- Jquery js link -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <!-- Counterup js link -->
    <script src="assets/js/waypoints.js"></script>
    <script src="assets/js/jquery.counterup.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- Marquee js link -->
    <script src="assets/js/jquery.marquee.min.js"></script>
    <!-- Popper js link -->
    <script src="assets/js/popper.min.js"></script>
    <!-- Swiper js link -->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <!-- Fancybox js link -->
    <script src="assets/js/jquery.fancybox.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <!-- Wow js link -->
    <script src="assets/js/wow.min.js"></script>
    <!-- Bootstrap js link -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- MAin js link -->
    <script src="assets/js/main.js"></script>

    <script>
        $(".marquee_text2").marquee({
            direction: "left",
            duration: 25000,
            gap: 50,
            delayBeforeStart: 0,
            duplicated: true,
            startVisible: true,
        });
    </script>


</body>
</html>