<?php
    $uid = $_SESSION['uid'];
    $checkName = getRequest($uid);
    renderView('check_name_get', ['requests' => $checkName]);
?>