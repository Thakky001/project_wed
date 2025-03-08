<?php
    $uid = $_SESSION['uid'];
    $eid = $_GET['eid'];
    $checkId = $_GET['checkId'];
    $check_Name = checkId($checkId, $uid, $eid);
    $checkName = getRequest($uid);
    renderView('check_name_get', ['requests' => $checkName]);
?>