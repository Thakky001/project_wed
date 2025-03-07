<?php
$id = isset($_GET["uid"]) ? (int)$_GET["uid"] : 0;
// ดึงข้อมูลของผู้ใช้
$result = getUserById($id);

$name = isset($_POST["name"]) ? trim($_POST["name"]) : "";
$email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
$birthday = isset($_POST["birthday"]) ? trim($_POST["birthday"]) : ""; // รับวันเกิด

// ตรวจสอบว่ามีไฟล์อัปโหลดหรือไม่
if (isset($_FILES["img"]) && $_FILES["img"]["error"] == 0) {
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $img = basename($_FILES["img"]["name"]);
    $target_file = $target_dir . $img;
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        // ใช้ชื่อไฟล์ที่อัปโหลดได้
        $updateSuccess = updateUser($result, $name, $email, $img, $birthday);
        var_dump($updateSuccess);
        renderView('profile_get',['result' => $result]);
    } else {

    }
}

?>