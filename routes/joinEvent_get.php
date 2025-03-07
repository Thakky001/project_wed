
<?php
$eventId = $_GET["eid"];
$userId = $_SESSION["uid"]; 


$search_keyword = "";
if (isset($_GET["search"])) {
    $search_keyword = trim($_GET["search"]);
}
$Events = searchEvents($search_keyword);
$joinEvent = joinEvent($eventId, $userId);
var_dump($joinEvent);
if ($joinEvent) {
    renderView('activity_get', ['Events' => $Events]);
} else {
    echo "ไม่สามารถเข้าร่วมได้";
}

?>