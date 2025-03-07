<?php
// echo 'HomePage Work!!!';
if (isset($_SESSION['uid']))
{
    $data = getUserById($_SESSION['uid']);
    renderView('home_get', $data);
}
else
{
    renderView('home_get');
}
