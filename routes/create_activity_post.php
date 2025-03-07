<?php
    $event_name = $_POST["even_name"];
    $max_member = $_POST["max_member"];
    $description = $_POST["description"];
    $status = $_POST["status"];
    $date = $_POST["date"];
    $img = $_FILES["img"]["name"]; // รับชื่อไฟล์ภาพ
    $target_dir = "uploads/"; // ไดเรกทอรีที่เก็บไฟล์
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $search_keyword = "";
    
    if (isset($_GET["search"])) {
        $search_keyword = trim($_GET["search"]);
    }
    
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)){
        // ทำการเพิ่มกิจกรรม
        $addSuccess = addEvent($event_name, $max_member, $description, $img, $date, $status, $_SESSION["uid"]);
        if ($addSuccess) {
            $result = searchEvents($search_keyword);
            renderView('create_activity_get',['result' => $result]);
        } else {
            echo "เกิดข้อผิดพลาด: ". $addSuccess;
        }
    }
?>