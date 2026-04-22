<?php
include_once 'db.php';

if (isset($_POST['submit'])) {
    $m_user = $_POST['m_user'];
    $b_id = $_POST['b_id'];
    $br_date_br = $_POST['br_date_br'];

    $sql = "INSERT INTO tb_borrow_book (br_date_br, b_id, m_user) 
            VALUES ('$br_date_br', '$b_id', '$m_user')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('ยืมหนังสือสำเร็จ'); window.location='borrow_return.php';</script>";
    } else {
        echo "<script>alert('ยืมหนังสือไม่สำเร็จ');</script>";
    }
}
?>
