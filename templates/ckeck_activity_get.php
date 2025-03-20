<?php
    $events = $data['myEvents'];
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เช็คกิจกรรมที่สร้าง</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/boxcenter.css">
</head>

<body>
    <div class="container">
        <div class="content-container">
            <div class="request-container">
                <?php if (!empty($events)) { ?>
                    <?php foreach ($events as $row) { ?>
                        <div class="activity-card">
                            <div>
                                <h4>กิจกรรม: <?php echo htmlspecialchars($row['even_name']); ?></h4>
                            </div>
                            <div class="action-buttons">
                                <form action="/check_name" method="GET">
                                    <input type="hidden" name="uid" value="<?= htmlspecialchars($row["user_id"]); ?>">
                                    <input type="hidden" name="eid" value="<?= htmlspecialchars($row["eid"]); ?>">
                                    <button type="submit" class="btn btn-warning">เช็คชื่อ</button>
                                </form>
                                <a href="/request?eid=<?= ($row["eid"]); ?>">
                                    <button class="btn btn-warning">คำขอกิจกรรม</button>
                                    <input type="hidden" name="event_id" value="<?php echo htmlspecialchars($row["eid"]); ?>">
                                </a>
                                <a href="/edit_activity?eid=<?= ($row["eid"]); ?>">
                                    <button class="btn btn-warning">แก้ไข</button>
                                    <input type="hidden" name="event_id" value="<?php echo htmlspecialchars($row["eid"]); ?>">
                                </a>
                                <a href="/delete_ckeck_activity?eid=<?= ($row["eid"]); ?>">
                                    <button class="btn btn-danger" onclick="confirmDelete()">ลบ</button>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <p class="text-center">❌ ไม่พบกิจกรรมที่สร้าง</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        function confirmDelete(eventId) {
            if (confirm("คุณแน่ใจหรือไม่ว่าต้องการลบกิจกรรมนี้?")) {
                window.location.href = "/delete_event?id=" + eventId;
            }
        }
    </script>
</body>

</html>