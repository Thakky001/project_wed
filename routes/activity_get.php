<?php
$search_keyword = "";
$search_date = "";
$search_date1 = "";
if (isset($_GET["search"])) {
    $search_keyword = trim($_GET["search"]);
}
if (isset($_GET["date"])) {
    $search_date = trim($_GET["date"]);
}

if (isset($_GET["date1"])) {
    $search_date1 = trim($_GET["date1"]);
}
$Events = searchEvents($search_keyword);
renderView('activity_get', ['Events' => $Events]);
