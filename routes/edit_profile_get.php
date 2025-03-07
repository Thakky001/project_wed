<?php
// ตรวจสอบว่า 'id' มีอยู่ใน URL หรือไม่
if (isset($_GET["id"])) {
    $id = (int)$_GET["id"];
    
    // ดึงข้อมูลผู้ใช้จากฐานข้อมูล
    $result = getUserById($id);
    // เรียกฟังก์ชัน renderView เพื่อแสดงหน้า profile_edit
    renderView('edit_profile_get', ['result' => $result]);
    
} else {
    // ถ้าไม่มี 'id' ใน URL แสดงข้อความแจ้งเตือน
    echo "ID is required.";
}