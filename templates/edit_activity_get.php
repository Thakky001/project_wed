<?php
$event = $data['result'];
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>แก้ไขกิจกรรม</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bar.css">
    <link rel="stylesheet" href="css/from_long.css">
</head>

<body>
    <h1>แก้ไขกิจกรรม</h1>
    <div class="content-container">
        <div class="activity-card">
            <div class="activity-info">
                <form action="/edit_activity?eid=<?=htmlspecialchars($event['eid']); ?>" method="POST" enctype="multipart/form-data">
                    <img src="uploads/<?php echo htmlspecialchars($event['img']); ?>"><br>
                    <div>
                        <label for="profileImage" class="file-upload-btn">เพิ่มรูป</label>
                        <input type="file" id="img" name="img" accept="image/*" onchange="previewImage(event)" value="<?php echo htmlspecialchars($event['img']); ?>">
                    </div><br>
                    <button type="submit" class="btn btn-success">ยืนยันการแก้ไข</button>
            </div>
            <div class="activity-details">
                <div class="form-group">
                    <label for="eventName">ชื่อกิจกรรม</label>
                    <input type="text" id="name" name="name" placeholder="ชื่อกิจกรรม" value="<?php echo htmlspecialchars($event['even_name']); ?>">
                </div>
                <div class="form-group">
                    <label for="eventDetails">ข้อมูลอื่นๆ</label>
                    <input type="text" id="description" name="description" placeholder="เพิ่มข้อมูลอื่นๆ" value="<?php echo htmlspecialchars($event['description']); ?>">
                </div>
                <div class="form-group">
                    <label for="max_member">กำหนดจำนวนผู้เข้าร่วม</label>
                    <input type="text" id="max_member" name="max_member" placeholder="กำหนดจำนวนผู้เข้าร่วม" value="<?php echo htmlspecialchars($event['max_member']); ?>">
                </div>
                <div class="form-group">
                    <label for="eventTime">เวลาการจัดกิจกรรม</label>
                    <input type="datetime-local" id="date" name="date" value="<?php echo htmlspecialchars($event['date']); ?>">
                </div>
                <div class="form-group">
                    <select name="status" required>
                        <option value="active" <?php echo ($event['status'] == 'active') ? 'selected' : ''; ?>>กำลังเปิดรับสมัคร</option>
                        <option value="closed" <?php echo ($event['status'] == 'closed') ? 'selected' : ''; ?>>ปิดรับสมัคร</option>
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

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var img = document.querySelector("img");
                img.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</body>

</html>