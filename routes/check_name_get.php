<?php
    $uid = $_GET['uid'];
    $eid = $_GET['eid'];
    $checkName = getRequest($uid, $eid);
    renderView('check_name_get', ['requests' => $checkName]);
?>