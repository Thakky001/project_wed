<?php
$search_keyword = "";
if (isset($_GET["search"])) {
    $search_keyword = trim($_GET["search"]);
}
$Events = searchEvents($search_keyword);
renderView('activity_get', ['Events' => $Events]);
