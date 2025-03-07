<?php
    $result = isset($data['Events']) ? $data['Events'] : null;
    $search_keyword = isset($_GET['search']) ? $_GET['search'] : "";
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/boxcenter.css">
</head>

<body>
<h1>กิจกรรม</h1>
    <div class="navbar">
        <h2 class="navbar-title"></h2>
        <form method="get" action="/activity" class="search-box">
            <input type="text" name="search" class="form-control" placeholder="ค้นหา" value="<?php echo htmlspecialchars($search_keyword); ?>">
            <button type="submit" class="btn btn-primary">ค้นหา</button>
        </form>
    </div>

    <div class="container">
        <div class="content-container">
            <div class="request-container">
                <?php if (!empty($result)) { ?>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <form action="/details_activity" method="post">
                            <a href="/details_activity?eid=<?=($row["eid"]);?>">
                                <div class="request-card">
                                    <span><?php echo htmlspecialchars($row["even_name"]); ?></span>
                                    <span class="status-text"><?php echo htmlspecialchars($row["max_member"]); ?> คน</span>
                                </div>
                            </a>
                        </form>
                    <?php } ?>
                <?php } else { ?>
                    <p class="text-center">❌ ไม่พบกิจกรรมที่ค้นหา</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        function toggleMenu() {
            var menu = document.getElementById("menu-list");
            menu.style.display = (menu.style.display === "block") ? "none" : "block";
        }
    </script>
</body>

</html>