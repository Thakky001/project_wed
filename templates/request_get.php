<?php
$result = $data['requests'];

?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>คำร้องขอเข้าร่วมกิจกรรม</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/boxcenter.css">
</head>

<body>
    <div class="container">
        <div class="content-container">
            <div class="request-container">
                <?php foreach ($result as $row) { ?>
                    <div class="request-card"><span><?php echo htmlspecialchars($row["name"]); ?></span>
                        <div class="button-group">
                            <a href="/anumat?eid=<?=($row['eid']); ?>&uid=<?=($row['uid']);?>&status=<?=('confirm')?>">
                                <button class="btn btn-success">อนุมัติ</button>
                            </a>
                            <a href="/anumat?eid=<?=($row['eid']); ?>&uid=<?=($row['uid']);?>&status=<?=('cancel')?>">
                                <button class="btn btn-danger">ปฏิเสธ</button>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>