<?php
include_once 'db.php';

if (isset($_GET['m_user'])) {
    $m_user = $_GET['m_user'];
    $sql = "SELECT m_name FROM tb_member WHERE m_user = '$m_user'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        echo $row['m_name'];  // ส่งข้อมูลชื่อผู้ใช้
    } else {
        echo "ไม่พบข้อมูล";
    }
}
?>
