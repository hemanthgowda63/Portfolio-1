<?php
require_once "db_config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = trim($_POST["name"] ?? "");
    $email   = trim($_POST["email"] ?? "");
    $subject = trim($_POST["subject"] ?? "");
    $message = trim($_POST["message"] ?? "");

    if ($name === "" || $email === "" || $subject === "" || $message === "") {
        echo "Please fill all fields.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    try {
        $sql = "INSERT INTO contact_messages (name, email, subject, message)
                VALUES (:name, :email, :subject, :message)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":name"    => $name,
            ":email"   => $email,
            ":subject" => $subject,
            ":message" => $message
        ]);

        echo "Message sent successfully and stored in database!";
    } catch (PDOException $e) {
        echo "Error saving message: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
