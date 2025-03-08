<?php
// ตรวจสอบว่ามีค่าตัวแปร $data['requests'] และเป็น mysqli_result หรือไม่
$result = isset($data['requests']) && is_object($data['requests']) ? $data['requests'] : null;
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
                <?php if (!empty($result)): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="activity-card">
                            <img src="<?php echo htmlspecialchars($row['img'] ?? 'default.jpg'); ?>"
                                alt="กิจกรรม" class="activity-image">
                            <div class="activity-info">
                                <h5><?php echo htmlspecialchars($row['even_name'] ?? "ไม่ทราบชื่อกิจกรรม"); ?></h5>
                            </div>

                            <?php if ($row['status'] == 'confirm'): ?>
                                <?php if ($row['check_Id'] == 0): ?>
                                    <div class="activity-action">
                                        <a href="#">คำร้อง</a><br>
                                        <input type="text" class="form-control otp-input" placeholder="กรอก OTP">
                                        <a class="btn btn-success btn-sm mt-2"
                                            href="/checkName?eid=<?= htmlspecialchars($row['event_id'] ?? ''); ?>&uid=<?= htmlspecialchars($row['user_id'] ?? ''); ?>&checkId=1">
                                            ยืนยัน
                                        </a>
                                    </div>
                                <?php elseif ($row['check_Id'] == 1): ?>
                                    <div class="activity-action">
                                        <h5>เช็คชื่อแล้ว</h5>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="activity-action">
                                    <h5><?php echo htmlspecialchars($row['status']); ?></h5>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-danger">ไม่พบข้อมูลกิจกรรม</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>