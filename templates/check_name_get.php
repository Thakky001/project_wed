<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เช็คชื่อ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bar.css">
    <link rel="stylesheet" href="css/boxcenter.css">
</head>

<body>
    <div class="container">
        <div class="content-container">
            <div class="activity-container">
                <div class="activity-card">
                    <img src="activity1.jpg" alt="กิจกรรม" class="activity-image">
                    <div class="activity-info">
                        <h5>กิจกรรมที่ร่วม</h5>
                    </div>
                    <div class="activity-action">
                        <a href="#">คำร้อง</a><br>
                        <input type="text" class="form-control otp-input" placeholder="กรอก OTP">
                        <button class="btn btn-success btn-sm mt-2">ยืนยัน</button>
                    </div>
                </div>
                <div class="activity-card">
                    <img src="activity2.jpg" alt="กิจกรรม" class="activity-image">
                    <div class="activity-info">
                        <h5>กิจกรรมที่ร่วม</h5>
                    </div>
                    <div class="activity-action">
                        <a href="#">คำร้อง</a><br>
                        <input type="text" class="form-control otp-input" placeholder="กรอก OTP">
                        <button class="btn btn-success btn-sm mt-2">ยืนยัน</button>
                    </div>
                </div>
                <div class="activity-card">
                    <img src="https://p16-va.lemon8cdn.com/tos-alisg-v-a3e477-sg/oQEeSfyJUCAhB7zwINEbAQAgh0nkEiN2LA5E2O~tplv-tej9nj120t-origin.webp" alt="กิจกรรม" class="activity-image">
                    <div class="activity-info">
                        <h5>กิจกรรมที่ร่วม</h5>
                    </div>
                    <div class="activity-action">
                        <a href="#">คำร้อง</a><br>
                        <input type="text" class="form-control otp-input" placeholder="กรอก OTP">
                        <button class="btn btn-success btn-sm mt-2">ยืนยัน</button>
                    </div>
                </div>
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
