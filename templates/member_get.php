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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/boxcenter.css">
    <style>
        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .user-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #dee2e6;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content-container">
            <div class="request-container">
                <?php if (!empty($result)) { ?>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <div class="request-card">
                            <div class="user-info">
                                <img src="<?php echo htmlspecialchars($row['img'] ?? 'https://via.placeholder.com/50'); ?>"
                                    class="user-image"
                                    alt="Profile image of <?php echo htmlspecialchars($row['name']); ?>">
                                <span class="user-name"><?php echo htmlspecialchars($row['name']); ?></span>
                            </div>
                            <span class="status-text"><?php echo htmlspecialchars($row['status']); ?></span>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="no-data-message">
                        <i class="bi bi-people-fill" style="font-size: 2rem; display: block; margin-bottom: 1rem;"></i>
                        ไม่พบผู้เข้าร่วมกิจกรรม
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add dynamic status colors
        document.querySelectorAll('.status-text').forEach(element => {
            const status = element.textContent.toLowerCase();
            element.classList.add(
                status === 'approved' ? 'bg-success text-white' :
                status === 'pending' ? 'bg-warning text-dark' :
                'bg-secondary text-white'
            );
        });
    </script>
</body>

</html>