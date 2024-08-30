<?php
    $id="";
    $id = $_GET['user_id'];

    $servername = 'localhost';
    $username = 'intern';
    $password = 'Int3rn@cc';
    $dbname = 'hospital';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    $sql = 'DELETE FROM message WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    header("location: /hospital/admin/tables.php");
    exit;
?>                                             