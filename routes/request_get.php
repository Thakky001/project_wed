<?php
$creatorId = $_SESSION["uid"];
$requests = getPendingEventRequests($creatorId);

renderView('request_get', ['requests' => $requests]);



