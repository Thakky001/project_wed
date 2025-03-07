<?php
$result = isset($data['result']) && is_array($data['result']) ? $data['result'] : null;
$profile_picture = !empty($result['profile_picture']) ? $result['profile_picture'] : 'uploads/default.png';
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>โปรไฟล์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bar.css">
    <link rel="stylesheet" href="css/boxcenter.css">
</head>

<body>

    <div class="container">
        <div class="profile-container">
            <div class="profile">
                <h1>โปรไฟล์</h1>
                <img src="uploads/<?= htmlspecialchars($result['img'] ?? 'ไม่มีข้อมูล', ENT_QUOTES, 'UTF-8') ?>" alt="Profile Image">
                <p>ชื่อ: <?= htmlspecialchars($result['name'] ?? 'ไม่มีข้อมูล', ENT_QUOTES, 'UTF-8') ?></p>
                <p>วันเกิด: <?= htmlspecialchars($result['birthday'] ?? 'ไม่มีข้อมูล', ENT_QUOTES, 'UTF-8') ?></p>
                <p>อีเมล: <?= htmlspecialchars($result['email'] ?? 'ไม่มีข้อมูล', ENT_QUOTES, 'UTF-8') ?></p>
                <!-- <p>จำนวนการเข้าร่วม : 2</p> -->
                <a class="edit-button" href="/edit_profile?id=<?= htmlspecialchars($result['uid'], ENT_QUOTES, 'UTF-8') ?>">แก้ไขโปรไฟล์</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>