<?php
    $user_id = $_SESSION["uid"]; // ดึง user_id ของผู้ใช้ที่ล็อกอินอยู่
    $event_id = $_POST["event_id"];
    $checkUserEvent = isUserRegistered($user_id, $event_id);

    $search_keyword = "";
    if (isset($_GET["search"])) {
        $search_keyword = trim($_GET["search"]);
    }
    $result = searchEvents($search_keyword);

    if ($checkUserEvent) {
        echo "คุณเคยลงทะเบียนกิจกรรมนี้แล้ว";
        renderView('events_get',['result' => $result]);
    } else {
        $registerSuccess = registerEvent($user_id, $event_id);
        if ($registerSuccess) {
            echo "ลงทะเบียนกิจกรรมสำเร็จ!";
            //updateEventMemberCount($event_id); // อัปเดตสถานะกิจกรรม
            renderView('events_get',['result' => $result]);
        } else {
            echo "เกิดข้อผิดพลาดในการลงทะเบียน";

        }
    }
?>