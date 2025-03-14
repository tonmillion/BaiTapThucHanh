<?php
// khai báo sử dụng session
session_start();

// khai báo utf-8 để hiển thị tiếng Việt
header('Content-Type: text/html; charset=UTF-8');

// xử lý đăng nhập
if (isset($_POST['dangnhap'])) {
    // kết nối database
    include('connect.php');

    // lấy dữ liệu nhập vào
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']); // Sửa lỗi tên biến

    // kiểm tra đã nhập đủ tên đăng nhập và mật khẩu
    if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ username và password. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    // mã hóa password
    $password = md5($password);

    // Kiểm tra tên đăng nhập có tồn tại hay không
    $query = "SELECT username, password FROM member WHERE username='$username'";
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));

    if (mysqli_num_rows($result) == 0) {
        echo "Tên đăng nhập không tồn tại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    // lấy password trong database ra
    $row = mysqli_fetch_array($result);

    // so sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['password']) {
        echo "Mật khẩu không đúng, vui lòng nhập lại. <a href='javascript:history.go(-1)'>Trở lại</a>";
        exit;
    }

    // lưu tên đăng nhập
    $_SESSION['username'] = $username;
    echo "Xin chào <b>" . $username . "</b>. Bạn đã đăng nhập thành công. <a href=''>Thoát</a>";

    // đóng kết nối
    mysqli_close($connect);
}
?>
