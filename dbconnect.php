<?php
$server_name = "localhost";
$admin = "root"; 
$pw = ''; 
$db = "news_admin";

try {
    $conn = new PDO(
        "mysql:host=$server_name;dbname=$db",
        $admin, 
        $pw
    );
    
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    echo "unsuccssful connection" . $err->getMessage();
}
?>




