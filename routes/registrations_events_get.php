<?php
    $user_id = $_SESSION["uid"];
    $events = getUserRegisteredEvents($user_id);
    renderView('registrations_events_get', ['events' => $events]);
?>