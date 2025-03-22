<?php
    $uid = $_SESSION['uid'];
    $result = checkRequst($uid);

?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ขอเข้าร่วมกิจกรรม</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/boxcenter.css">
</head>

<body>
    <div class="container">
        <div class="content-container">
            <div class="request-container">
                <?php foreach ($result as $row) { ?>
                    <?php if($row['status'] == 'pending'){ ?>
                    <div class="request-card"><span><?php echo htmlspecialchars($row["even_name"]); ?></span>
                        <div class="button-group">
                        <a href="/deletemyrequest?rid=<?= ($row["rid"]); ?>">
                                    <button class="btn btn-danger" onclick="confirmDelete()">ลบ</button>
                                </a>
                        </div>
                    </div>
                <?php }?>
                <?php } ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

<script>
    function confirmDelete(eventId) {
            if (confirm("คุณแน่ใจหรือไม่ว่าต้องการลบกิจกรรมนี้?")) {
                window.location.href = "/delete_event?id=" + eventId;
            }
        }
</script>