<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/boxcenter.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="container login-container" style="max-width: 600px; width: 100%;">
        <div class="card shadow-lg position-relative">
            <div class="card-header btn-color text-white text-center">
                <h3 class="mb-0">เข้าสู่ระบบ</h3>
            </div>
            <div class="card-body">
                <form action="/login" method="post">
                    <div class="mb-3 mt-5">
                        <input type="email" id="email" name="email" class="form-control p-2" placeholder="ชื่อผู้ใช้" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control p-2" placeholder="รหัสผ่าน" required>
                    </div>
                    <div class="mb-3">
                        <p><?php if(isset($_SESSION['message'])) {echo $_SESSION['message'];unset($_SESSION['message']); }?></p>
                    </div>
                    <div class="d-grid mt-5">
                        <button type="submit" class="btn btn-color p-1">เข้าสู่ระบบ</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center position-relative">
                <a href="/register" class="register-link">สมัครสมาชิก</a>
            </div>
        </div>
    </div>

</body>
</html>
