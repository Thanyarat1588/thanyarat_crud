<?php
include_once 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // ดึงข้อมูลผู้ใช้จากฐานข้อมูล
    $sql = "SELECT * FROM `tb_member` WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ยืนยันการลบข้อมูล</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 shadow">
                    <h1 class="text-center">ยืนยันการลบข้อมูลผู้ใช้</h1>
                    <form action="member_del.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                        <div class="mb-3">
                            <label class="form-label">ชื่อผู้ใช้</label>
                            <input type="text" class="form-control" value="<?php echo $user['m_user']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ชื่อ - สกุล</label>
                            <input type="text" class="form-control" value="<?php echo $user['m_name']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">เบอร์โทร</label>
                            <input type="text" class="form-control" value="<?php echo $user['m_phone']; ?>" readonly>
                        </div>
                        <div class="d-flex gap-3">
                            <input type="submit" name="confirm_delete" value="ยืนยันการลบ" class="btn btn-danger w-100">
                            <a href="member_manage.php" class="btn btn-secondary w-100">ยกเลิก</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>