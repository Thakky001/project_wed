<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/boxcenter.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="container login-container" style="max-width: 600px; width: 100%;">
        <div class="card shadow-lg position-relative">
            <div class="card-header btn-color text-white text-center">
                <h3 class="mb-0">ลงทะเบียน</h3>
            </div>
            <div class="card-body">
                <form  action="/register" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 p-2">
                        <input type="text" name="name" class="form-control" placeholder="ชื่อผู้ใช้" required>
                    </div>
                    <div class="mb-3 p-2">
                        <input type="email" name="email" class="form-control" placeholder="อีเมล" required>
                    </div>
                    <div class="mb-3 p-2">
                        <input type="password" name="password" class="form-control" placeholder="รหัสผ่าน" required>
                    </div>
                    <div class="d-flex mb-3 p-2">
                        <input type="date" name="birthday" required>
                    </div>
                    <div class="mb-3 mt-2">
                        <input type="file" class="form-control" name="img" id="img" placeholder="Enter picture" name="picture">
                    </div>
                    <div class="d-grid mt-5 p-1">
                        <button type="submit" class="btn btn-color p-2">ยืนยันการลงทะเบียน</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center position-relative">
                <a href="/login" class="register-link">เข้าสู่ระบบ</a>
            </div>
        </div>
    </div>

</body>
</html>
