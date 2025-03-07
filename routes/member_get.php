<?php
    $eid = $_GET['eid'];
    $result = checkName($eid);
    renderView('member_get',['result' => $result]);
?>