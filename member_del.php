<?php
include_once 'db.php';

if (isset($_POST['confirm_delete'])) {
    $id = $_POST['id'];
    // ลบข้อมูลผู้ใช้จากฐานข้อมูล
    $sql = "DELETE FROM `tb_member` WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>window.location='member.php';</script>";
    } else {
        echo "<script>alert('ไม่สามารถลบข้อมูลได้!!'); window.location='member.php';</script>";
    }
}
?>
