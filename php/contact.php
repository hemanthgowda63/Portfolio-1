<?php
require_once "db_config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = trim($_POST["name"] ?? "");
    $email   = trim($_POST["email"] ?? "");
    $subject = trim($_POST["subject"] ?? "");
    $message = trim($_POST["message"] ?? "");

    // Basic validation
    if ($name === "" || $email === "" || $subject === "" || $message === "") {
        echo "Please fill all fields.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    // Insert into database
    $sql = "INSERT INTO contact_messages (name, email, subject, message)
            VALUES (:name, :email, :subject, :message)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":name"    => $name,
        ":email"   => $email,
        ":subject" => $subject,
        ":message" => $message
    ]);

    echo "Message sent successfully!";
} else {
    echo "Invalid request.";
}
?>
