<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD System</title>
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

<body>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 shadow">
                    <form action="insert_db.php" method="post">
                        <h1 class="text-center">เพิ่มข้อมูลสมาชิก</h1>

                        <label for="user" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control mb-3" name="username" autofocus required>

                        <label for="pass" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control mb-3" name="pass" required>

                        <label for="name" class="form-label">ชื่อ - สกุล</label>
                        <input type="text" class="form-control mb-3" name="name" required>
                     
                        <label for="phone" class="form-label">เบอร์โทร</label>
                        <input type="tel" id="phone" class="form-control mb-3" name="phone" pattern="\d{10}" title="กรอกเบอร์โทร 10 หลัก" placeholder="กรอกเบอร์โทร" required>



                        <div class="d-flex gap-3">
                            <input type="submit" value="ตกลง" name="submit" class="btn btn-success w-100 ">
                            <a href="member.php" class="btn btn-danger w-100">ย้อนกลับ</a>
                       </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
function validateTel(input) {
    input.value = input.value.replace(/\D/g, ''); 
}
</script>
</body>

</html>
