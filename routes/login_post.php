<?php
$email = $_POST['email'];
$password = $_POST['password'];
$result = login($email, $password);
if ($result) {
    $unix_timestamp = time();
    $_SESSION['timestamp'] = $unix_timestamp;
    $_SESSION['uid'] = $result['uid'];
    $data = getUserById($result['uid']);
    $search_keyword = "";
    if (isset($_GET["search"])) {
        $search_keyword = trim($_GET["search"]);
    }

    $Events = searchEvents($search_keyword);
    renderView('activity_get', ['Events' => $Events]);
} else {
    $_SESSION['message'] = 'รหัสไม่ถูกต้อง';
    echo "รหัสไม่ถูกต้อง";
    renderView('login_get');
    unset($_SESSION['message']);
    unset($_SESSION['timestamp']);
}
