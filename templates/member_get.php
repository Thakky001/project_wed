<?php
    $result = $data['result'];
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ผู้เข้าร่วมกิจกรรม</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bar.css">
    <link rel="stylesheet" href="css/boxcenter.css">
</head>

<body>
<h1>สมาชิกที่เข้าร่วมกิจกรรม</h1>
    <div class="container">
        <div class="content-container">
            <div class="request-container">
            <?php if (!empty($result)) { ?>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <div class="request-card"><span><?php echo htmlspecialchars($row['name']); ?></span> <span class="status-text"><?php echo htmlspecialchars($row['status']); ?></span></div>
                    <?php } ?>
                <?php } else { ?>
                    <p class="text-center text-danger">❌ ไม่พบสมาชิก</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
<script>
    function toggleMenu() {
        var menu = document.getElementById("menu-list");
        menu.style.display = (menu.style.display === "block") ? "none" : "block";
    }
</script>
</html>
