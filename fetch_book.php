<?php
include_once 'db.php';

if (isset($_GET['b_id'])) {
    $b_id = $_GET['b_id'];
    $sql = "SELECT b_name FROM tb_book WHERE b_id = '$b_id'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        echo $row['b_name'];  // ส่งข้อมูลชื่อหนังสือ
    } else {
        echo "ไม่พบข้อมูล";
    }
}
?>
