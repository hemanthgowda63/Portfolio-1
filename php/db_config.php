<?php
$host = "localhost";
$dbname = "portfolio_db";  // make sure this DB exists
$username = "root";        // XAMPP default
$password = "";            // XAMPP default is empty

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
?>
