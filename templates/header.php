<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <link rel="stylesheet" href="css/bar.css"> -->
     <style>
        
     </style>
</head>
<body>
    <div class="menu-list" id="menu-list">
        <?php
        if (isset($_SESSION['timestamp'])) {
        ?>
            <div class="navbar">
                <div class="menu" onclick="toggleMenu()">☰</div>
            </div>
            <div class="dropdown">
                    <div class="menu-list" id="menu-list">
                        <a href="/profile">โปรไฟล์</a>
                        <a href="/activity">กิจกรรม</a>
                        <a href="/check_name">เช็คชื่อ</a>
                        <a href="/ckeck_activity">เช็คกิจกรรม</a>
                        <a href="/create_activity">สร้างกิจกรรม</a>
                        <a href="/request">คำร้อง</a>
                        <a href="/member">ผู้เข้าร่วมกิจกรรม</a>
                        <a href="/logout">ออกจากระบบ</a>
                    </div>
            </div>
        <?php
        } else {
        ?>

        <?php
        }
        ?>
    </div>
</body>
</html>

<script>
    function toggleMenu() {
        var menu = document.getElementById("menu-list");
        menu.style.display = (menu.style.display === "block") ? "none" : "block";
    }
</script>