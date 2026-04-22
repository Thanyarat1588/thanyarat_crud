<?php
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
       

        <!-- ปุ่มยืมหนังสือ -->
        <button class="btn btn-primary" onclick="window.location.href='borrow_book.php'">ยืมหนังสือ</button>
        <button class="btn btn-warning" onclick="showReturnForm()">คืนหนังสือ</button>

        <!-- ฟอร์มการคืนหนังสือ -->
        <div id="returnForm" style="display:none;" class="mt-4">
            <h3>ฟอร์มคืนหนังสือ</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="b_id">รหัสหนังสือ</label>
                    <input type="text" class="form-control" name="b_id" id="b_id" required>
                    <button type="button" class="btn btn-info mt-2" onclick="searchBook()">ค้นหา</button>
                </div>

                <!-- ข้อมูลการยืมหนังสือ -->
                <div id="borrowDetails" class="mt-3">
                    <p>ชื่อหนังสือ: <span id="bookName"></span></p>
                    <p>ชื่อผู้ยืม: <span id="memberName"></span></p>
                </div>

                <div class="form-group mt-3">
                    <label for="br_fine">ค่าปรับ</label>
                    <input type="number" class="form-control" name="br_fine" id="br_fine">
                </div>

                <div class="form-group mt-3">
                    <label for="br_date_rt">วันที่คืน</label>
                    <input type="date" class="form-control" name="br_date_rt" id="br_date_rt" value="<?php echo date('Y-m-d'); ?>" readonly>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">คืนหนังสือ</button>
                <button type="button" class="btn btn-danger" onclick="cancelReturn()">ยกเลิก</button>
            </form>
        </div>
    </div>

    <script>
        // แสดงฟอร์มการคืนหนังสือ
        function showReturnForm() {
            document.getElementById("returnForm").style.display = "block";
        }

        // ค้นหาหนังสือจากรหัส
        function searchBook() {
            var b_id = document.getElementById("b_id").value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "search_borrowed.php?b_id=" + b_id, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.status === "found") {
                        document.getElementById("bookName").innerText = response.book_name;
                        document.getElementById("memberName").innerText = response.member_name;
                    } else {
                        alert("ไม่พบข้อมูลการยืมหนังสือ");
                    }
                }
            };
            xhr.send();
        }

        // ยกเลิกการคืนหนังสือ
        function cancelReturn() {
            window.location.href = 'borrow_return.php';  // กลับไปที่หน้าฟอร์มหลัก
        }
    </script>
</body>
</html>
