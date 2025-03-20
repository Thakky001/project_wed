<?php

function registerEvent($user_id, $event_id)
{
    $conn = getConnection();
    $sql = "INSERT INTO register_events (user_id, event_id, status) VALUES (?, ?, 'pending')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $event_id);

    if ($stmt->execute()) {
        return true; // สมัครสำเร็จ
    } else {
        return $stmt->error; // สมัครไม่สำเร็จ (คืนค่า error)
    }
}

function registerUser($name, $email, $password, $img, $birthday)
{
    $conn = getConnection();
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // เข้ารหัสรหัสผ่าน
    $sql = "INSERT INTO users (name, email, password, img, birthday) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $hashed_password, $img, $birthday);

    return $stmt->execute();
}

function cancelRegistration($user_id, $event_id)
{
    $conn = getConnection();
    $sql = "DELETE FROM register_events WHERE user_id = ? AND event_id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        return "Error: SQL Prepare Failed - " . $conn->error;
    }

    $stmt->bind_param("ii", $user_id, $event_id);

    if ($stmt->execute()) {
        return true; // ลบสำเร็จ
    } else {
        return "เกิดข้อผิดพลาด: " . $stmt->error;
    }
}

function getUserRegisteredEvents($user_id): array
{
    $conn = getConnection();

    $sql = "SELECT e.eid, e.even_name, e.event_time, e.max_member, e.description, e.img
                FROM events e
                JOIN register_events r ON e.eid = r.event_id
                WHERE r.user_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result ? $result->fetch_all(MYSQLI_ASSOC) : []; 
}

function isUserRegistered($user_id, $event_id) {
    $conn = getConnection(); // ฟังก์ชันเชื่อมต่อฐานข้อมูล
    $sql = "SELECT COUNT(*) FROM register_events WHERE user_id = ? AND event_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $event_id);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    
    return $count > 0; 
}


function getMemberEvent($event_id)
{
    $conn = getConnection();
    $sql = "SELECT DISTINCT u.*, r.event_id 
        FROM users u JOIN register_events r 
        ON u.user_id = r.event_id
        WHERE event_id =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function joinEvent($eventId, $userId)
{
    $status = 'pending';
    $conn = getConnection();
    $checkStmt = $conn->prepare("INSERT INTO register_events (user_id, event_id, status) VALUES (?, ?, ?)");
    $checkStmt->bind_param("iis", $userId, $eventId, $status);
    $checkStmt->execute();
    if ($checkStmt) {
        return true;
    } else {
        return false;
    }
}

function getPendingEventRequests($creatorId) {
    $requests = [];
    $conn = getConnection();

    if (!$conn) {
        error_log("Database connection failed.");
        return ["error" => "เชื่อมต่อฐานข้อมูลล้มเหลว"];
    }

    $stmt = $conn->prepare("
        SELECT r.rid, u.uid, e.eid, r.status , u.name, r.check_Id
        FROM register_events r
        JOIN users u ON r.user_id = u.uid
        JOIN events e ON r.event_id = e.eid
        WHERE e.eid = ? AND r.status = 'pending'
    ");

    if (!$stmt) {
        error_log("Prepare statement failed: " . $conn->error);
        return ["error" => "เกิดข้อผิดพลาดในการเตรียมคำสั่ง SQL"];
    }

    $stmt->bind_param("i", $creatorId);
    
    if (!$stmt->execute()) {
        error_log("Execute statement failed: " . $stmt->error);
        return ["error" => "เกิดข้อผิดพลาดในการดึงข้อมูล"];
    }

    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $requests[] = $row;
    }
    return $requests;
}

function acceptRequest($status, $requestId, $eventId) {    
    $conn = getConnection();
    $sql = "UPDATE register_events SET status = ? WHERE user_id = ? AND event_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $status, $requestId, $eventId);
    $result = $stmt->execute();
    return $result;
}

function getRequest($requestId, $eid) {    
    $conn = getConnection();
    $sql = "SELECT DISTINCT e.eid, e.img, e.even_name, e.description, e.date, e.user_id, r.*
            FROM register_events r 
            JOIN events e ON r.event_id = e.eid
            WHERE e.user_id = ?
            AND e.eid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $requestId, $eid);
    $stmt->execute(); 
    $result = $stmt->get_result(); 
    return $result; 
}


function checkName($event_id)
{
    $conn = getConnection();
    $sql = "SELECT DISTINCT u.*, r.event_id, r.status 
        FROM users u 
        JOIN register_events r ON u.uid = r.user_id
        WHERE event_id =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function countEvent($event_id)
{
    $conn = getConnection();
    $sql = "SELECT  COUNT(event_id)
        FROM register_events 
        WHERE event_id =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}


function checkId($checkId, $uid, $eventId) {    
    $conn = getConnection();
    $sql = "UPDATE register_events SET check_Id = ? WHERE user_id = ? AND event_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $checkId, $uid, $eventId);
    $result = $stmt->execute();
    return $result;
}





