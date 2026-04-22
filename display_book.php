<?php
include_once 'db.php';  // รวมไฟล์การเชื่อมต่อกับฐานข้อมูล

// คำสั่ง SQL เพื่อดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT * FROM tb_book";
$result = mysqli_query($conn, $sql);
?>

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
          <a class="nav-link" href="member.php">การจัดการสมาชิก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="display_book.php">รายการหนังสือ</a></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-5">รายการหนังสือทั้งหมด</h2>

        <a class="btn btn-primary mb-2 float-end" href="add_book.php"><i class="bi bi-person-plus"></i> เพิ่มหนังสือ</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>รหัสหนังสือ</th>
                    <th>ชื่อหนังสือ</th>
                    <th>ชื่อผู้แต่ง</th>
                    <th>หมวดหมู่</th>
                    <th>ราคา</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['b_id']; ?></td>
                        <td><?php echo $row['b_name']; ?></td>
                        <td><?php echo $row['b_writer']; ?></td>
                        <td><?php 
                            if ($row['b_category'] == 1) {
                                echo "วิชาการ";
                            } elseif ($row['b_category'] == 2) {
                                echo "วรรณกรรม";
                            } else {
                                echo "เบ็ดเตล็ด";
                            }
                        ?></td>
                        <td><?php echo $row['b_price']; ?> บาท</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
