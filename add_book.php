<?php
include_once 'db.php';  // รวมไฟล์การเชื่อมต่อกับฐานข้อมูล

if (isset($_POST['submit'])) {
    // รับค่าจากฟอร์ม
    $b_id = $_POST['b_id'];
    $b_name = $_POST['b_name'];
    $b_writer = $_POST['b_writer'];
    $b_category = $_POST['b_category'];
    $b_price = $_POST['b_price'];

    // คำสั่ง SQL สำหรับเพิ่มข้อมูลหนังสือใหม่
    $sql = "INSERT INTO tb_book (b_id, b_name, b_writer, b_category, b_price) 
            VALUES ('$b_id', '$b_name', '$b_writer', '$b_category', '$b_price')";
    $result = mysqli_query($conn, $sql);

    // เช็คผลลัพธ์
    if ($result) {
        echo "<script>alert('เพิ่มหนังสือสำเร็จ'); window.location='display_book.php';</script>";
    } else {
        echo "<script>alert('เพิ่มหนังสือไม่สำเร็จ');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มหนังสือ</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 shadow">
                    <h2 class="text-center mb-4">เพิ่มหนังสือใหม่</h2>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="b_id" class="form-label">รหัสหนังสือ</label>
                            <input type="text" class="form-control" name="b_id" id="b_id" required>
                        </div>

                        <div class="mb-3">
                            <label for="b_name" class="form-label">ชื่อหนังสือ</label>
                            <input type="text" class="form-control" name="b_name" id="b_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="b_writer" class="form-label">ชื่อผู้แต่ง</label>
                            <input type="text" class="form-control" name="b_writer" id="b_writer" required>
                        </div>

                        <div class="mb-3">
                            <label for="b_category" class="form-label">หมวดหมู่</label>
                            <select class="form-select" name="b_category" id="b_category" required>
                                <option value="1">วิชาการ</option>
                                <option value="2">วรรณกรรม</option>
                                <option value="3">เบ็ดเตล็ด</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="b_price" class="form-label">ราคา</label>
                            <input type="number" class="form-control" name="b_price" id="b_price" required>
                        </div>


                        <div class="d-flex gap-3">
                            <button type="submit" name="submit" class="btn btn-primary w-50">เพิ่มหนังสือ</button>
                            <a href="display_book.php" class="btn btn-danger w-50">ย้อนกลับ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>