<?php
    $uid = $_GET['uid'];
    $eid = $_GET['eid'];
    $checkName = getRequest($eid);
    renderView('check_name_get', ['requests' => $checkName]);
?>