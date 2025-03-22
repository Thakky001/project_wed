<?php
$result = isset($data['Events']) ? $data['Events'] : null;

$event_id = $result['eid'] ?? null;
$uid = $_SESSION['uid'];

$user_registered = isUserRegistered($uid, $event_id);

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>รายละเอียดกิจกรรม</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/from_long.css">
</head>

<body>
    <div class="content-container">
        <div class="activity-card">
            <div class="activity-info">
                <?php if (!empty($result)) { ?>
                    <img src="<?= htmlspecialchars($result['img']); ?>"><br>
                    <text class="btn btn-secondary">จำนวนผู้เข้าร่วม <?= htmlspecialchars($result["total_registered"]); ?>/<?= htmlspecialchars($result["max_member"]); ?></text>
                    <a href="/member?eid=<?= ($result["eid"]); ?>"><text class="btn btn-secondary">ดูผู้เข้าร่วม 👈🏻</text></a><br><br>
                    <input type="hidden" name="eid" value="<?= htmlspecialchars($result['eid']); ?>">
                    
                    <?php if (!$user_registered) { ?>
                        <a href="/joinEvent?eid=<?= $result['eid']; ?>" class="btn btn-success">สมัครเข้าร่วม</a>
                    <?php } else { ?>
                        <text class="btn btn-danger">คุณสมัครแล้ว</text>
                    <?php } ?>
                </div>
            <div class="activity-details">
                <h4>ชื่อกิจกรรม</h4>
                <h4><?= htmlspecialchars($result["even_name"]); ?></h4>
                <p>ข้อมูลอื่นๆ</p>
                <p><?= nl2br(htmlspecialchars($result["description"])); ?></p>
            </div>
        </div>
    <?php } ?>
    </div>
</body>
<script>
    function toggleMenu() {
        var menu = document.getElementById("menu-list");
        menu.style.display = (menu.style.display === "block") ? "none" : "block";
    }
</script>
</html>
