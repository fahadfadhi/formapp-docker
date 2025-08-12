<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $gender = $_POST['gender'];
  $message = $_POST['message'];

  $conn = new mysqli("mysql", "root", "fahad@123", "formdb");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $stmt = $conn->prepare("INSERT INTO users (name, email, phone, gender, message) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $name, $email, $phone, $gender, $message);

  if ($stmt->execute()) {
    echo "Form submitted successfully!";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
} else {
  echo "Form was not submitted correctly.";
}
?>

