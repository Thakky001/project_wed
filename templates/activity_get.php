<?php
    $result = isset($data['Events']) ? $data['Events'] : null; ///45648979879879
    $search_keyword = isset($_GET['search']) ? $_GET['search'] : "";
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/boxcenter.css">
    <title>กิจกรรม</title>
</head>
<body>
    <div class="container mt-4">
        
        <div class="d-flex justify-content-center my-3">
            <form method="get" action="/activity" class="input-group w-50">
                <input type="text" name="search" class="form-control" placeholder="ค้นหากิจกรรม" value="<?php echo htmlspecialchars($search_keyword); ?>">
                <button type="submit" class="btn btn-primary">ค้นหา</button>
            </form>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php if (!empty($result)) { ?>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?php echo htmlspecialchars($row['img']); ?>" class="img-fluid rounded-start" alt="Event Image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <a href="/details_activity?eid=<?= htmlspecialchars($row['eid']); ?>" class="text-decoration-none">
                                            <span class="fw-bold text-dark"> <?php echo htmlspecialchars($row['even_name']); ?> </span>
                                        </a>
                                        <span class="badge bg-primary"> <?php echo htmlspecialchars($row['max_member']); ?> คน </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <p class="text-center text-danger">❌ ไม่พบกิจกรรมที่ค้นหา</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
