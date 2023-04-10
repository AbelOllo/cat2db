<?php
// Connect to the database
$dbhost = 'localhost';
$dbname = 'mydatabase';
$dbuser = 'myusername';
$dbpass = 'mypassword';
$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Insert new user into the database
  $stmt = $db->prepare("INSERT INTO users (email, username, password) VALUES (:email, :username, :password)");
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':password', $password);
  $stmt->execute();

  // Redirect to login page
  header("Location: login.php");
  exit();
}
?>

<!-- Registration form HTML -->
<form method="POST">
  <label>Email:</label>
  <input type="email" name="email" required>
  <br>
  <label>Username:</label>
  <input type="text" name="username" required>
  <br>
  <label>Password:</label>
  <input type="password" name="password" required>
  <br>
  <input type="submit" value="Sign Up">
</form>
