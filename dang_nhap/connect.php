<?php
    $connect = mysqli_connect ('localhost', 'root', '', 'data') or die ('Không thể kết nối đến database');
    mysqli_set_charset($connect, 'UTF8');
    if ($connect === false) {
        die ("ERROR: could not connect. " . mysqli_connect_error());
    }

    /*else {
        echo 'Kết nối database thành công!';
    }*/
?>