<?php
   $profile = $data['result'];
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>แก้ไขโปรไฟล์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/boxcenter.css">
</head>
<body>
<div class="container">
        <div class="profile-container">
            <div class="profile-form">
                <form action="/edit_profile" method="POST" enctype="multipart/form-data">
                    <div class="text-center">
                        <img id="profilePreview" src="uploads/<?php echo htmlspecialchars($profile['img']); ?>">
                        <div>
                            <label for="img" class="file-upload-btn">เลือกภาพโปรไฟล์</label>
                            <input type="file" id="img" name="img" accept="image/*" onchange="previewImage(event)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">ชื่อ</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($profile['name']); ?>">
                    </div>

                    <div class="form-group">
                        <label for="dob">วันเกิด</label>
                        <input type="date" id="birthday" name="birthday" class="form-control" value="<?php echo htmlspecialchars($profile['birthday']); ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">อีเมล</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($profile['email']); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">บันทึกการแก้ไข</button>
                </form>
            </div>
        </div>
    </div>
</body>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        function toggleMenu() {
        var menu = document.getElementById("menu-list");
        menu.style.display = (menu.style.display === "block") ? "none" : "block";
    }

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('profilePreview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
