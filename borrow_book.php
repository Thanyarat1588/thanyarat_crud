<?php
// รวมไฟล์การเชื่อมต่อฐานข้อมูล
include_once 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ยืม-คืนหนังสือ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>ยืม-คืนหนังสือ</h2>

        <!-- ปุ่มเพื่อเปิดฟอร์มยืมหนังสือ -->
        <button class="btn btn-primary" onclick="showBorrowForm()">ยืมหนังสือ</button>
        
        <button class="btn btn-primary" onclick="window.location.href='return_book.php'">คืนหนังสือ</button>

        <!-- ฟอร์มการยืมหนังสือ -->
        <div id="borrowForm" style="display:none;" class="mt-4">
            <h3>ฟอร์มยืมหนังสือ</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="m_user">รหัสผู้ใช้</label>
                    <input type="text" class="form-control" name="m_user" id="m_user" required>
                    <button type="button" class="btn btn-info mt-2" onclick="fetchMemberData()">ตกลง</button>
                </div>

                <div class="form-group">
                    <label for="b_id">รหัสหนังสือ</label>
                    <input type="text" class="form-control" name="b_id" id="b_id" required>
                    <button type="button" class="btn btn-info mt-2" onclick="fetchBookData()">ตกลง</button>
                </div>

                <!-- ข้อมูลสมาชิกที่ยืม -->
                <div id="memberDetails" class="mt-3">
                    <p>ชื่อผู้ยืม: <span id="memberName"></span></p>
                </div>

                <!-- ข้อมูลหนังสือที่ยืม -->
                <div id="bookDetails" class="mt-3">
                    <p>ชื่อหนังสือ: <span id="bookName"></span></p>
                </div>

                <div class="form-group mt-3">
                    <label for="br_date_br">วันที่ยืม</label>
                    <input type="date" class="form-control" name="br_date_br" id="br_date_br" required>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">ยืมหนังสือ</button>
            </form>
        </div>
    </div>

    <script>
        // แสดงฟอร์มยืมหนังสือ
        function showBorrowForm() {
            document.getElementById("borrowForm").style.display = "block";
        }

        // ดึงข้อมูลสมาชิกจากฐานข้อมูล
        function fetchMemberData() {
            var m_user = document.getElementById("m_user").value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "fetch_member.php?m_user=" + m_user, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById("memberName").innerText = xhr.responseText;
                }
            };
            xhr.send();
        }

        // ดึงข้อมูลหนังสือจากฐานข้อมูล
        function fetchBookData() {
            var b_id = document.getElementById("b_id").value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "fetch_book.php?b_id=" + b_id, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById("bookName").innerText = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>
</body>
</html>
