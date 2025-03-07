<?php
    $events = $_GET["eid"];
    $Events = getEventById($events);
    renderView('details_activity_get', ['Events' => $Events]);
?>