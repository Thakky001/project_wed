<?php
    function isEmailExists($email){
        $conn = getConnection();
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        
        return $stmt->num_rows > 0;
    }
    
    function getUserById($id){
        $conn = getConnection();
        $sql = "SELECT * FROM users WHERE uid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    function updateUser($id, $name, $email, $img, $birthday){
        $conn = getConnection();
        $sql = "UPDATE users SET name = ?, email = ?, img = ?, birthday = ? WHERE uid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $name, $email, $img, $birthday, $id);
        
        if ($stmt->execute()) {
            return true; // อัปเดตสำเร็จ
        } else {
            return "Error: " . $stmt->error;
        }
    }

    function setUser(){
        $conn = getConnection();
        $sql = "INSERT INTO users (name, email, password, img, birthday) VALUES ('?,?,?,?,?')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $name, $email, $password, $img, $birthday);
        
        if ($stmt->execute()) {
            return true; // สมัครสำเร็จ
        } else {
            return "Error: ". $stmt->error; // สมัครไม่สำเร็จ (คืนค่า error)
        }
    }


    
?>