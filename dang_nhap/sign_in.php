<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="style1.css"/>
    </head>

    <body>
        <form action='sign_in.php' class="dangnhap" method='POST'>
            Tên đăng nhập: <input type='text' name='username' />
            Mật khẩu: <input type='text' name='password' />
            <input type='submit' class="button" name="dangnhap" value='Đăng nhập'/>
            <a href='sign_up.php' title='Đăng ký'>Đăng ký</a>
            <?php require 'xuly.php'; ?>
        </form>
    </body>
</html>