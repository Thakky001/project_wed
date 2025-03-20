<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// เช็คว่า session มีค่า timestamp หรือไม่
$logged_in = isset($_SESSION['timestamp']);

$page_titles = [
    "profile" => "โปรไฟล์",
    "activity" => "กิจกรรม",
    "check_name" => "เช็คชื่อ",
    "ckeck_activity" => "กิจกรรมที่สร้าง",
    "create_activity" => "สร้างกิจกรรม",
    "request" => "คำร้องขอ",
    "member" => "ผู้เข้าร่วมกิจกรรม"
];

$request_uri = $_SERVER['REQUEST_URI'];
$page = basename(parse_url($request_uri, PHP_URL_PATH), ".php");

$title = $page_titles[$page] ?? "กิจกรรม";

$hide_header = in_array($page, ["logout", "register"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/bar.css">
</head>

<body>
    <?php if (!$hide_header && $logged_in): ?>
    <div class="navbar">
        <div class="menu" onclick="toggleMenu()">☰</div>
        <h2 class="navbar-title"><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h2>
    </div>

    <div class="menu-list" id="menu-list">
        <a href="/profile">โปรไฟล์</a>
        <a href="/activity">กิจกรรม</a>
        <!-- <a href="/check_name">เช็คชื่อ</a> -->
        <a href="/ckeck_activity">กิจกรรมที่สร้าง</a>
        <a href="/create_activity">สร้างกิจกรรม</a>
        <a href="/logout">ออกจากระบบ</a>
    </div>
    <?php endif; ?>

    <script>
        function toggleMenu() {
            var menu = document.getElementById("menu-list");
            menu.classList.toggle("active");
        }

        document.addEventListener("click", function(event) {
            var menu = document.getElementById("menu-list");
            var menuButton = document.querySelector(".menu");
            if (!menu.contains(event.target) && !menuButton.contains(event.target)) {
                menu.classList.remove("active");
            }
        });
    </script>
</body>
</html>
