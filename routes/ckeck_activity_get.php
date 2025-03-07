<?php
    $user_id = $_SESSION["uid"];
    $myEvents = getUserEvents($user_id);
    renderView('ckeck_activity_get',['myEvents' => $myEvents]);
?>