<?php
include_once 'db.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    // รับค่าจาก input อื่นๆ
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $sql = "UPDATE `tb_member` SET 
    `m_user`='$username',
    `m_pass`='$pass',
    `m_name`='$name',  
    `m_phone`='$phone' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('แก้ไขสำเร็จ'); window.location='member.php';</script>";
    } else {
        echo "<script>alert('แก้ไขไม่สำเร็จ!!'); window.location='member.php';</script>";
    }
}
