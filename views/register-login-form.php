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
    <title>IgniteFoot - Bán giày thể thao nam</title>
    <link rel="icon" href="assets/image/thumbnail.svg" type="image/gif" sizes="20x20"> 
</head>

<body>
    <div class="modal login-modal fade show" id="user-login" style="display: block;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">
                                Đăng Nhập
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">Đăng ký</button>
                        </li>
                    </ul>
                </div>
                <div class="modal-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="login-registration-form">
                                <div class="form-title">
                                    <h3>Đăng nhập</h3>
                                </div>
                                <form action="index.php?page=loginCustomer" method="post">
                                    <div class="form-inner mb-35">
                                        <input type="email" placeholder="Nhập Email" name="mail">
                                    </div>
                                    <div class="form-inner">
                                        <input id="password" type="password" placeholder="Mật khẩu" name="mk">
                                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                                    </div>
                                    <button class="primary-btn" type="submit">
                                        Đăng nhập
                                    </button>
                                    <a href="#" class="member">bạn chưa có tài khoản !</a>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="login-registration-form">
                                <div class="form-title">
                                    <h3>Đăng ký</h3>
                                </div>
                                <form method="post" action="index.php?page=registerCustomer">
                                    <div class="form-inner mb-25">
                                        <input type="text" placeholder="Tên tài khoản *" name="ten-tai-khoan">
                                    </div>
                                    <div class="form-inner mb-25">
                                        <input type="email" placeholder="Email *" name="email">
                                    </div>
                                    <div class="form-inner mb-25">
                                        <input id="password2" type="password" placeholder="Mật khẩu *" name="mat-khau">
                                        <i class="bi bi-eye-slash" id="togglePassword2"></i>
                                    </div>
                                    <div class="form-inner mb-35">
                                        <input id="password3" type="password" placeholder="Nhập lại mật khẩu *" name="nhap-lai-mk">
                                        <i class="bi bi-eye-slash" id="togglePassword3"></i>
                                    </div>
                                    <button class="primary-btn" type="submit">
                                        Đăng ký
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS (bao gồm Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- JavaScript cho toggle password -->
    <script>
        // Toggle password visibility
        document.getElementById('togglePassword')?.addEventListener('click', function() {
            const password = document.getElementById('password');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });

        document.getElementById('togglePassword2')?.addEventListener('click', function() {
            const password = document.getElementById('password2');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });

        document.getElementById('togglePassword3')?.addEventListener('click', function() {
            const password = document.getElementById('password3');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    </script>
</body>
</html>