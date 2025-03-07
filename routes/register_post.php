<?php
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $birthday = $_POST["birthday"];
    $profile_pic = "";
    $target_dir = "uploads/";
    
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
// อัปโหลดรูปภาพ
if (!empty($_FILES["img"]["name"])) {
    $file_name = basename($_FILES["img"]["name"]);
    $target_file = $target_dir . time() . "_" . $file_name;
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        $profile_pic = $file_name;
    }
}

$checkEmail = isEmailExists($email);


if (!$checkEmail) {
    $registerSuccess = registerUser($name, $email, $pass, $profile_pic, $birthday);
    if ($registerSuccess) {
        echo "สมัครสำเร็จ!";
        renderView('register_get',['registerSuccess' => $registerSuccess]);
    } else {
        echo "เกิดข้อผิดพลาดในการสมัคร";
    }
}

?>