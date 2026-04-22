<?php
session_start();
include_once 'db.php';

$search = '';
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']); // ป้องกัน SQL Injection
    $sql = "SELECT * FROM `tb_member` WHERE m_user LIKE '%$search%' OR m_name LIKE '%$search%' OR m_phone LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM `tb_member`"; // ถ้าไม่ค้นหาให้แสดงข้อมูลทั้งหมด
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ระบบ CRUD</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
  <!-- js -->
  <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- icon -->
  <link rel="stylesheet" href="./icon/bootstrap-icons.css">
  <!-- font -->
  <style>
    @font-face {
      font-family: "Prompt";
      src: url(font/Prompt-Light.ttf) format('truetype');
    }

    body {
      font-family: "Prompt";
    }
  </style>
</head>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="member.php">การจัดการสมาชิก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_book.php">รายการหนังสือ</a></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="borrow_book.php">ยืมหนังสือ</a></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Table -->
<div class="container">
  <div class="row mt-5">
    <div class="col-mt-12">
      <h1 class="text-center mb-3">การจัดการข้อมูลสมาชิก</h1>

      <form class="d-flex justify-content-center mb-5" action="member.php" method="get">
        <input class="form-control me-2 w-25" type="search" aria-label="Search" name="search" value="<?php echo htmlspecialchars($search); ?>">
        <button class="btn btn-outline-success w-10" type="submit"><i class="bi bi-search"></i> ค้นหา</button>
      </form>

      <a class="btn btn-primary mb-2 float-end" href="insert.php"><i class="bi bi-person-plus"></i> เพิ่มข้อมูลสมาชิก</a>
    </div>
    <div class="table">
      <table class="table table-light table-striped table-hover text-center">
        <tr>
          <th>ชื่อผู้ใช้</th>
          <th>รหัสผ่าน</th>
          <th>ชื่อ - สกุล</th>
          <th>เบอร์โทร</th>
          <th>แก้ไข</th>
          <th>ลบ</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row['m_user']; ?></td>
            <td><?php echo $row['m_pass']; ?></td>
            <td><?php echo $row['m_name']; ?></td>
            <td><?php echo $row['m_phone']; ?></td>
            <td>
              <a href="member_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary text-white w-50"><i class="bi bi-pencil-fill"></i> แก้ไข</a>
            </td>
            <td>
              <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-dark w-50"><i class="bi bi-trash-fill"></i> ลบ</a>
            </td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>

</body>

</html>
