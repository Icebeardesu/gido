function login() {
const user = document.getElementById("user").value.trim();
const pass = document.getElementById("pass").value.trim();
const msg = document.getElementById("msg");


if (user === "" || pass === "") {
msg.textContent = "Vui lòng nhập đầy đủ thông tin!";
return;
}


if (user === "admin" && pass === "123456") {
msg.style.color = "#00ff99";
msg.textContent = "Đăng nhập thành công!";
setTimeout(() => alert("Chào mừng bạn!"), 800);
} else {
msg.style.color = "#ff4d4d";
msg.textContent = "Sai tài khoản hoặc mật khẩu!";
}
}