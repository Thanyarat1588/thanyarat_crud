<?php
    include_once 'db.php';
    if(isset($_POST['submit'])){
        $username = $_POST['username'];      
        $pass = $_POST['pass'];
        $name= $_POST['name'];
        $phone = $_POST['phone'];

        $sql_check = "SELECT * FROM `tb_member` WHERE m_user = '$username'";
        $result_check = mysqli_query($conn, $sql_check);
    
        if (mysqli_num_rows($result_check) > 0) {
            // หากชื่อผู้ใช้ซ้ำ
            echo "<script>alert('ชื่อผู้ใช้ซ้ำ กรุณาใช้ชื่อผู้ใช้ใหม่'); window.location='insert.php';</script>";
        } else {
            // หากชื่อผู้ใช้ไม่ซ้ำ ให้ทำการบันทึกข้อมูล
            $sql = "INSERT INTO `tb_member`(`m_user`, `m_pass`, `m_name`, `m_phone`) 
                    VALUES ('$username','$pass','$name','$phone')";
            $result = mysqli_query($conn, $sql);
    
        if($result){
            echo "<script>alert('Successfully'); window.location='member.php';</script>";
           
        } else {
            echo "<script>alert('Error!!'); window.location='insert.php';</script>";

        }

    }
    }

?>