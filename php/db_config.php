<?php
$host = "localhost";       // change if needed
$dbname = "portfolio_db";  // your DB name
$username = "root";        // DB username
$password = "";            // DB password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
?>
