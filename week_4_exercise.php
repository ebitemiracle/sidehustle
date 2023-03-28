<!-- Front end -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>User Registration</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>User Registration</h1>
  <form action="register.php" method="post">
    <label for="first-name">First Name:</label>
    <input type="text" name="first-name" id="first-name" required>

    <label for="last-name">Last Name:</label>
    <input type="text" name="last-name" id="last-name" required>

    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="gender">Gender:</label>
    <select name="gender" id="gender">
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
    </select>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <label for="confirm-password">Confirm Password:</label>
    <input type="password" name="confirm-password" id="confirm-password" required>

    <input type="submit" value="Register">
  </form>
</body>
</html>


<!-- Back-end  -->
<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Collect user input
$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$username = $_POST['username'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm-password'];

// Check if username or email already exists in database
$sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  die("Username or email already exists. Please choose a different username or email.");
}

// Check if password and confirm password match
if ($password != $confirm_password) {
  die("Passwords do not match. Please try again.");
}

// Encrypt password
$encrypted_password = md5($password);

// Insert user data into database
$sql = "INSERT INTO users (first_name, last_name, username, email, gender, password) VALUES ('$first_name', '$last_name', '$username', '$email', '$gender', '$encrypted_password')";

if (mysqli_query($conn, $sql)) {
  echo "Registration successful!";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>



<!-- Database schema -->
CREATE TABLE users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(30) NOT NULL,
  last_name VARCHAR(30) NOT NULL,
  username VARCHAR(30) NOT NULL UNIQUE,
  email VARCHAR(50) NOT NULL UNIQUE,
  gender
