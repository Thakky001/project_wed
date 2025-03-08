<?php
// ตรวจสอบว่า $data['requests'] มีค่าหรือไม่
$result = isset($data['requests']) ? (is_array($data['requests']) ? $data['requests'] : [$data['requests']]) : [];

// Debug ดูค่าจริงๆ ของ $result
var_dump($result);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เช็คชื่อ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bar.css">
    <link rel="stylesheet" href="css/boxcenter.css">
</head>

<body>
    <div class="container">
        <div class="content-container">
            <div class="activity-container">
                <div class="activity-card">
                <?php if (!empty($result)) { ?>
                    <?php foreach ($result as $row) { ?>
                        <?php if (isset($row['status']) && $row['status'] == 'confirm') { ?>
                            <div class="activity-card">
                                <img src="<?php echo htmlspecialchars($row['img']); ?>" alt="กิจกรรม" class="activity-image">
                                <div class="activity-info">
                                    <h5><?php echo htmlspecialchars($row['even_name']); ?></h5>
                                    <p>วันที่: <?php echo htmlspecialchars($row['date']); ?></p>
                                    <p>รายละเอียด: <?php echo htmlspecialchars($row['description']); ?></p>
                                </div>
                                <div class="activity-action">
                                    <a href="#">คำร้อง</a><br>
                                    <input type="text" class="form-control otp-input" placeholder="กรอก OTP">
                                    <button class="btn btn-success btn-sm mt-2">ยืนยัน</button>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                <?php } else { ?>
                    <p class="text-center text-danger">❌ ไม่มีคำขอที่รอดำเนินการ</p>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
