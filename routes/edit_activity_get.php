<?php
    $eid = $_GET['eid'];
    $result = getEventById($eid);

    if ($result) {
        renderView('edit_activity_get', ['result' => $result]);
    } else {
        echo "ไม่พบกิจกรรมที่ค้นหา";
    }
?>