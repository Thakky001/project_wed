<?php 
    $user_id = $_SESSION["uid"];
    $event_id = $_POST["event_id"];

    $cancelevents = cancelRegistration($user_id, $event_id);
    if ($cancelevents) {
        echo "ลบเเล้ว";
        $events = getUserRegisteredEvents($user_id);
        renderView('registrations_events_get',['events' => $events]);
    } else {
        echo "ไม่สามารถลบได้";
    }
?>