<?php
    $uid = $_SESSION['uid'];
    $eid = $_GET['eid'];
    $checkId = $_GET['checkId'];
    $check_Name = checkId($checkId, $uid, $eid);
    $checkName = getRequest($eid);
    renderView('check_name_get', ['requests' => $checkName]);
?>