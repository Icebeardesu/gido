<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f4f6f8;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background: #fff;
            width: 380px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 14px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 2px rgba(79,70,229,0.15);
        }

        .form-group select {
            cursor: pointer;
            background: #fff;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #4f46e5;
            color: #fff;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover {
            background: #4338ca;
        }
    </style>
</head>
<body>

    

    <form class="form-container" method="post" action="admin.php?pageAdmin=addUser">
        <div>
            <a href="admin.php?pageAdmin=userControl">Quay lại</a>
        </div>

        <h2>Thêm người dùng</h2>

        <div class="form-group">
            <input type="text" placeholder="Tên người dùng" name="user_name">
        </div>

        <div class="form-group">
            <input type="email" placeholder="Email" name="user_email">
        </div>

        <div class="form-group">
            <input type="password" placeholder="Mật khẩu" name="user_password">
        </div>

        <div class="form-group">
            <select name="user_role">
                <option value="0">Khách hàng</option>
                <option value="1">Nhân viên</option>
                <option value="2">Admin</option>
            </select>
        </div>

        <button type="submit">Thêm người dùng</button>
    </form>

</body>
</html>
