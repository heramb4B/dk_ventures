<?php
// Database credentials
$servername = "127.0.0.1";
$username = "u748716185_dkv_admin";
$password = "Dkventures%123";
$dbname = "u748716185_dkv_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Capture form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO contact_info (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);

// Execute and check
if ($stmt->execute()) {
  echo "<script>alert('Thank you! Your message has been submitted successfully.'); window.location.href='contact.html';</script>";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
