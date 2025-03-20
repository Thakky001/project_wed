<?php
    $uid = $_GET['uid'];
    $eid = $_GET['eid'];
    $status = $_GET['status'];
    $result = acceptRequest($status, $uid, $eid);
    $myEvents = getUserEvents($uid);
    renderView('ckeck_activity_get',['myEvents' => $myEvents]);
?>