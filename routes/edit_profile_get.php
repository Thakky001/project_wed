<?php
$id = (int)$_GET["id"];
$result = getUserById($id);
renderView('edit_profile_get', ['result' => $result]);
