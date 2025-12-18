<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/login-admin-page.css">
</head>
<body>
    
    <div class="login-container">
        <h2>Đăng nhập</h2>
        <div class="input-group">
        <label for="user">Tài khoản</label>
        <input type="text" id="user" placeholder="Nhập tài khoản..." />
        </div>
        <div class="input-group">
        <label for="pass">Mật khẩu</label>
        <input type="password" id="pass" placeholder="Nhập mật khẩu..." />
        </div>
        <button class="btn" onclick="login()">Đăng nhập</button>
        <div class="message" id="msg"></div>
    </div>

    <script src="../assets/js/login-admin-page.js"></script>
</body>
</html>