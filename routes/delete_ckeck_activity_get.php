<?php
    $event_id = $_GET["eid"];
    $myEvents = getEventById($event_id);
    if ($myEvents) {
        $user_id = $_SESSION["uid"];
        $deleteEvens = deleteEvent($event_id);
        $myEvents = getUserEvents($user_id);
        renderView('ckeck_activity_get', ['myEvents' => $myEvents]);
    } else {
        renderView('ckeck_activity_get', ['myEvents' => $myEvents]);
        echo "ไม่พบกิจกรรมที่ค้นหา";
    }
?>