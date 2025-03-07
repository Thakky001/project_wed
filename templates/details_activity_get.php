<?php
$result = isset($data['Events']) ? $data['Events'] : null;
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
                    <img src=<?= htmlspecialchars($result['img']); ?>><br>
                    <text class="btn btn-secondary">จำนวนผู้เข้าร่วม <?php echo htmlspecialchars($result["total_registered"]); ?>/<?php echo htmlspecialchars($result["max_member"]); ?></text>
                    <a href="/member?eid=<?= ($result["eid"]); ?>"><text class="btn btn-secondary">ผู้เข้าร่วม</text></a><br><br>
                    <input type="hidden" name="eid" value="<?= htmlspecialchars($result['eid']); ?>">
                    <a href="/joinEvent?eid=<?= $result['eid']; ?>" class="btn btn-success">สมัครเข้าร่วม</a>
            </div>
            <div class="activity-details">
                <h4>ชื่อกิจกรรม</h4>
                <h4><?php echo htmlspecialchars($result["even_name"]); ?></h4>
                <p>ข้อมูลอื่นๆ</p>
                <p><?php echo nl2br(htmlspecialchars($result["description"])); ?></p>
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