<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สร้างกิจกรรม</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bar.css">
    <link rel="stylesheet" href="css/from_long.css">
</head>

<body>
    <div class="content-container">
        <div class="activity-card">
            <div class="activity-info">
                <form method="post" action="/create_activity" enctype="multipart/form-data">
                    <img src="https://cdn.pixabay.com/photo/2017/11/10/05/24/add-2935429_1280.png"><br>
                    <div>
                        <label for="profileImage" class="file-upload-btn">เพิ่มรูป</label>
                        <input type="file" id="img" name="img" accept="image/*" >
                    </div><br>
                    <button type="submit" class="btn btn-success">ยืนยันการสร้าง</button>
            </div>
            <div class="activity-details">
                <div class="form-group">
                    <label for="eventName">ชื่อกิจกรรม</label>
                    <input type="text" id="even_name" name="even_name" placeholder="ชื่อกิจกรรม">
                </div>
                <div class="form-group">
                    <label for="eventDetails">ข้อมูลอื่นๆ</label>
                    <input type="text" id="description" name="description" placeholder="เพิ่มข้อมูลอื่นๆ">
                </div>
                <div class="form-group">
                    <label for="eventDetails">กำหนดจำนวนผู้เข้าร่วม</label>
                    <input type="text" id="max_member" name="max_member" placeholder="กำหนดจำนวนผู้เข้าร่วม">
                </div>
                <div class="form-group">
                    <label for="eventTime">เวลาการจัดกิจกรรม</label>
                    <input type="date" id="date" name="date">
                </div>
                <div class="form-group">
                    <select name="status" required>
                        <option value="active">กำลังเปิดรับสมัคร</option>
                        <option value="closed">ปิดรับสมัคร</option>
                    </select>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function toggleMenu() {
            var menu = document.getElementById("menu-list");
            menu.style.display = (menu.style.display === "block") ? "none" : "block";
        }
    </script>
</body>

</html>