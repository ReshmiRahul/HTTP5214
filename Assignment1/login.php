<?php
include('reusables/connect.php');
include('inc/functions.php');

// Admin login logic
if (isset($_POST['adminLoginButton'])) {
    // Sanitize the email and password inputs
    $adminEmail = mysqli_real_escape_string($connect, $_POST['adminEmail']);
    $adminPassword = mysqli_real_escape_string($connect, $_POST['adminPassword']);

    // Hash password using md5 or use password_hash() as per your original code's approach
    $query = 'SELECT * 
              FROM adminTable
              WHERE email = "' . $adminEmail . '"
              AND password = "' . md5($adminPassword) . '"
              LIMIT 1';

    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result)) {
        $record = mysqli_fetch_assoc($result);
        // Set session variables for admin login
        $_SESSION['id'] = $record['id'];
        $_SESSION['email'] = $record['email'];
        header('Location: index.php');
        die();
    } else {
        set_message('Admin: No records found or incorrect credentials!', 'danger');
        header('Location: login.php');
        die();
    }
}
// User login logic
if (isset($_POST['userLoginButton'])) {
    // Sanitize the email and password inputs
    $userEmail = mysqli_real_escape_string($connect, $_POST['userEmail']);
    $userPassword = mysqli_real_escape_string($connect, $_POST['userPassword']);

    $query = 'SELECT * 
              FROM users
              WHERE email_id = "' . $userEmail . '"
              LIMIT 1';

    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result)) {
        $record = mysqli_fetch_assoc($result);
        // Verify password using password_verify
        if (password_verify($userPassword, $record['password'])) {
            $_SESSION['user_id'] = $record['id'];
            $_SESSION['user_email'] = $record['email_id'];
            header('Location: userIndex.php');
            die();
        } else {
            $_SESSION['message'] = 'User: Incorrect password!';
            $_SESSION['message_type'] = 'danger';
        }
    } else {
        $_SESSION['message'] = 'User: No records found!';
        $_SESSION['message_type'] = 'danger';
    }
    header('Location: login.php');
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"> <!-- Link to custom styles.css -->
</head>
<body>
    <div class="login-container">
        <div class="container-fluid">
            <div class="row">
                <!-- Admin login form on the left side -->
                <div class="col-md-6 login-form-left">
                    <h2 class="display-3 text-white">Admin Login</h2>
                    <!-- Display session-based messages -->
                    <?php get_message(); ?>
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label for="adminEmail" class="form-label text-white">Admin Email address</label>
                            <input type="email" class="form-control" name="adminEmail" id="adminEmail" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="adminPassword" class="form-label text-white">Password</label>
                            <input type="password" class="form-control" name="adminPassword" id="adminPassword">
                        </div>
                        <button type="submit" class="btn btn-primary" name="adminLoginButton">Login</button>
                    </form>
                </div>

                <!-- User login form on the right side -->
                <div class="col-md-6 login-form-right">
                    <h2 class="display-3">User Login</h2>
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label for="userEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="userEmail" id="userEmail" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="userPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" name="userPassword" id="userPassword">
                        </div>
                        <button type="submit" class="btn btn-primary" name="userLoginButton">Login</button>
                    </form>
                    <div class="mb-3">
                        <a href="register.php" class="text-decoration">Create a new account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
