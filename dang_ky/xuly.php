<?php
    header('Content-Type: text/html; charset=uft-8');

    //ket noi database
    $conn = mysqli_connect('localhost', 'root', '', 'data') or die ('Lỗi kết nối'); mysqli_set_charset($conn, "utf8");

    // kiem tra form bang isset
    if (isset($_POST['dangky'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
    


    if (empty($username)) {
        array_push($errors, "Username không được rỗng");
    }
    if (empty($password)) {
        array_push($errors, "Password không khớp");
    }
    if (empty($email)) {
        array_push($errors, "Email không được rỗng");
    }
    if (empty($phone)) {
        array_push($errors, "Username không được rỗng");
    }


    // Kiem tra username hoac email co bi trung hay khong
    $sql = "SELECT * FROM member WHERE username = '$username' OR email = '$email'";


    // thuc hien truy van
    $result = mysqli_query($conn, $sql);

    // Neu ket qua tra ve lon hon 1 thi nghia la username hoac email da ton tai trong database
    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">alert("Username bị trùng hoặc chưa nhập tên!"); windows.location="sign_up.php";</script>';

        // dung chuong trinh
        die ();
    }
    else {
        $sql = "INSERT INTO member (username, password, email, phone) VALUES ('$username', '$password', '$email', '$phone')";
        echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="sign_up.php";</script>';

        if (mysqli_query($conn, $sql)) {
            echo "Tên đăng nhập: ".$_POST['username']."<br/>";
            echo "Mật khẩu: ".$_POST['password']."<br/>";
            echo "Email đăng nhập: ".$_POST['email']."<br/>";
            echo "Số điện thoại: ".$_POST['phone']."<br/>";
        }
        else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="sign_up.php";</script>';
        }
    }
}
?>