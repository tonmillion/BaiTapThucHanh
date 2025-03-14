<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <form method="post" action="sign_up.php" class="form">
            <h2>Đăng ký tài khoản</h2>
            Username: <input type="text" name="username" value="" required>
            Password: <input type="text" name="password" value="" required>
            Email: <input type="email" name="email" value="" required>
            Phones: <input type="text" name="phone" value="" required>
            <input type="submit" name="dangky" value="Đăng ký"/>
            <?php require 'xuly.php';?>
        </form>
    </body>
</html>