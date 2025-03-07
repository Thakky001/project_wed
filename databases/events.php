<?php
    function addEvent($event_name, $max_member, $description, $image_name, $date, $status,$user_id) : bool{
        $conn = getConnection();
        $sql = "INSERT INTO events (even_name, max_member, description, img, date, status, user_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
    
        if (!$stmt) {
            return "Error: SQL Prepare Failed - " . $conn->error;
        }
    
        $stmt->bind_param("sissssi", $event_name, $max_member, $description, $image_name, $date, $status, $user_id);
    
        if ($stmt->execute()) {
            return true; // เพิ่มกิจกรรมสำเร็จ
        } else {
            return "เกิดข้อผิดพลาด: " . $stmt->error;
        }
    }
    
function deleteEvent($event_id) {
        $conn = getConnection();
    
        // ตรวจสอบว่าอีเวนต์มีอยู่จริงและเป็นของผู้ใช้หรือไม่
        $sql = "SELECT img FROM events WHERE eid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $event_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $event = $result->fetch_assoc();
    
        // ลบไฟล์รูปภาพหากมี
        if (!empty($event["img"])) {
            $image_path = "uploads/" . $event["img"];
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
    
        // ลบข้อมูลอีเวนต์ออกจากฐานข้อมูล
        $sql = "DELETE FROM events WHERE eid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $event_id);
    
        if ($stmt->execute()) {
            return "ลบอีเวนต์สำเร็จ";
        } else {
            return "เกิดข้อผิดพลาดในการลบอีเวนต์";
        }
    }
    
    function searchEvents($search_keyword): mysqli_result {
        $conn = getConnection();
        $sql = "SELECT * FROM events WHERE even_name LIKE ? ORDER BY date ASC";
        $stmt = $conn->prepare($sql);
        $search_param = "%" . $search_keyword . "%";
        $stmt->bind_param("s", $search_param);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    
    
    function getEventById($event_id) {
        $conn = getConnection();
        $sql = "SELECT * FROM events WHERE eid = ?";
        $stmt = $conn->prepare($sql);
    
        $stmt->bind_param("i", $event_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $event = $result->fetch_assoc();
    
        return $event; // คืนค่าข้อมูลกิจกรรมเป็น array
    }
    
    function updateEventMemberCount($event_id) {
        // นับจำนวนผู้ใช้ที่ลงทะเบียนอีเวนต์นี้
        $conn = getConnection();
        $sql = "SELECT COUNT(*) AS total FROM register_events WHERE event_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $event_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $total_members = $row['total'];
    
        // อัปเดตจำนวนสมาชิกในตาราง events
        $update_sql = "UPDATE events SET member_count = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ii", $total_members, $event_id);
        $update_stmt->execute();
    
        return $total_members;
    }

    function getUserEvents($user_id) {
        $conn = getConnection(); // ฟังก์ชันเชื่อมต่อฐานข้อมูล
        $sql = "SELECT eid, even_name, max_member, date, description, img, status FROM events WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $events = [];
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
    
        return $events;
    }

    function updateEvent($event_name, $max_member, $description, $image_name, $date, $status, $event_id) {
        $conn = getConnection();
        $sql = "UPDATE events 
                SET even_name = ?, max_member = ?, description = ?, img = ?, date = ?, status = ?
                WHERE eid = ?";
        $stmt = $conn->prepare($sql);
        $max_member = (int)$max_member;
        $event_id = (int)$event_id;
        $stmt->bind_param("sissssi", $event_name, $max_member, $description, $image_name, $date, $status, $event_id);
        $result = $stmt->execute();
        return $result;
    }
    function getAllEvents(){
        $conn = getConnection();
        $sql = "SELECT * FROM events WHERE eid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $events = $result->fetch_assoc();
        return $events;
    }
?>