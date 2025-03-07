<?php

$result = getUserById($_SESSION['uid']);

renderView('profile_get',['result' => $result]);