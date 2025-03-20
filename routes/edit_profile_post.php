<?php

$name = $_POST["name"];
$email = $_POST["email"] ;
$birthday = $_POST["birthday"]; 
$id = $_SESSION["uid"];
$result = getUserById($id);
// ตรวจสอบว่ามีไฟล์อัปโหลดหรือไม่
if (isset($_FILES["img"]) && $_FILES["img"]["error"] == 0) {
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $img = basename($_FILES["img"]["name"]);
    $target_file = $target_dir . $img;
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        $updateSuccess = updateUser($result, $name, $email, $img, $birthday);
        var_dump($updateSuccess);
        renderView('profile_get',['result' => $result]);
    } else {

    }
}

?>