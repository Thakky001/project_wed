<?php
$creatorId = $_GET["eid"];
$requests = getPendingEventRequests($creatorId);
renderView('request_get', ['requests' => $requests]);



