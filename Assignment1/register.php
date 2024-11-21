<?php
// Include the database connection
require('reusables/connect.php');

// Initialize variables
$username = $location = $age = $phone_number = $email_id = $password = "";
$error_message = "";
$success_message = "";

// Check if form is submitted via POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and retrieve form inputs
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $location = mysqli_real_escape_string($connect, $_POST['location']);
    $age = (int)$_POST['age'];
    $phone_number = mysqli_real_escape_string($connect, $_POST['phone_number']);
    $email_id = mysqli_real_escape_string($connect, $_POST['email_id']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    // Validate email format
    if (!filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format!";
    }
    // Check if password is strong (minimum length of 8 characters)
    elseif (strlen($password) < 8) {
        $error_message = "Password must be at least 8 characters long!";
    }
    // Check if any required fields are empty
    elseif (empty($username) || empty($location) || empty($age) || empty($phone_number) || empty($email_id) || empty($password)) {
        $error_message = "All fields are required!";
    } else {
        // Check if the email already exists in the database
        $email_check_query = "SELECT * FROM users WHERE Email_ID = '$email_id' LIMIT 1";
        $result = mysqli_query($connect, $email_check_query);
        if (mysqli_num_rows($result) > 0) {
            $error_message = "Email already registered!";
        } else {
            // Hash the password before saving it to the database
            $password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user data into the database
            $query = "INSERT INTO users (Username, Location, Age, Phone_Number, Email_ID, password) 
                      VALUES ('$username', '$location', '$age', '$phone_number', '$email_id', '$password')";

            if (mysqli_query($connect, $query)) {
                $success_message = "Registration successful! You can now log in.";
            } else {
                $error_message = "Error: " . mysqli_error($connect);
            }
        }
    }
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="registerStyles.css">
</head>
<body>
  <div class="container">
    <h2 class="mt-5">User Registration</h2>

    <!-- Display error or success messages -->
    <?php if (!empty($error_message)) { ?>
      <div class="alert alert-danger">
        <?php echo $error_message; ?>
      </div>
    <?php } ?>
    <?php if (!empty($success_message)) { ?>
      <div class="alert alert-success">
        <?php echo $success_message; ?>
      </div>
    <?php } ?>

    <!-- Registration Form -->
    <form action="register.php" method="POST">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" required>
      </div>

      <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <input type="text" class="form-control" id="location" name="location" value="<?php echo $location; ?>" required>
      </div>

      <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="number" class="form-control" id="age" name="age" value="<?php echo $age; ?>" required>
      </div>

      <div class="mb-3">
        <label for="phone_number" class="form-label">Phone Number</label>
        <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $phone_number; ?>" required>
      </div>

      <div class="mb-3">
        <label for="email_id" class="form-label">Email ID</label>
        <input type="email" class="form-control" id="email_id" name="email_id" value="<?php echo $email_id; ?>" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>

      <button type="submit" class="btn btn-primary">Register</button>

      <!-- Go to Login Button -->
      <div class="mt-3 text-center">
        <a href="login.php" class="btn btn-secondary">Go to Login</a>
      </div>

    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
