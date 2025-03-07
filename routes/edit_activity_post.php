<?php
$name = $_POST['name'] ?? '';
$max_member = $_POST['max_member'] ?? 0;
$status = $_POST["status"] ?? '';
$dascription = $_POST['description'] ?? '';
$event_date = $_POST['date'] ?? '';
$eid = (int)$_GET['eid'];
$user_id = $_SESSION["uid"];


    if(isset($_FILES['img']) && $_FILES['img']['error'] == 0){
        $img_name = basename($_FILES['img']['name']);
        $img_tmp_name = $_FILES['img']['tmp_name'];
        $upload_dir = "uploads/";
    
        // ตรวจสอบว่าโฟลเดอร์อัปโหลดมีอยู่หรือไม่
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
    
        $img_path = $upload_dir . $img_name;
        if (move_uploaded_file($img_tmp_name, $img_path)) {
            $result1 = updateEvent($name, $max_member, $dascription, $img_path, $event_date, $status, $eid);
            $myEvents = getUserEvents($user_id);
            renderView('ckeck_activity_get', ['myEvents' => $myEvents]);
        }
    }
?>