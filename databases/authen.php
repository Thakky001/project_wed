<?php

function login(String $email, String $password): array|bool
{
    $conn = getConnection();
    $sql = 'SELECT * FROM users WHERE email=?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows == 0)
    {
        return false;
    }
    $row = $result->fetch_assoc();

    if(password_verify($password, $row['password']))
    {
        $_SESSION['uid'] = $row['uid'];
        return $row;
    }else
    {
        return false;
    }
}



function logout():void
{
    unset($_SESSION['timestamp']);
}
