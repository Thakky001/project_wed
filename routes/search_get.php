<?php
$search_keyword = "";
$search_date = "";

if (isset($_GET["search"])) {
    $search_keyword = trim($_GET["search"]);
}
if (isset($_GET["date"])) {
    $search_date = trim($_GET["date"]);
}
$Events = searchEventsAndDate($search_keyword, $search_date);
renderView('activity_get', ['Events' => $Events]);
