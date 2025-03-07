<?php
    $uid = $_GET['uid'];
    $eid = $_GET['eid'];
    $status = $_GET['status'];
    $result = acceptRequest($status, $uid, $eid);
    $creatorId = $_SESSION["uid"];
    $requests = getPendingEventRequests($creatorId);
    renderView('request_get', ['requests' => $requests]);
?>