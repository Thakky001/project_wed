<?php
    $rid = $_GET["rid"];
    $deletemyrequest =  deletemyrequest($rid);
    renderView('myrequest_get');
?>