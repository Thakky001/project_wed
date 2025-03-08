<?php
    $uid = $_GET['uid'];
    $eid = $_GET['eid'];
    $status = $_GET['status'];
    $result = acceptRequest($status, $uid, $eid);
    $checkName = getRequest($uid);
    renderView('check_name_get', ['requests' => $checkName]);
?>