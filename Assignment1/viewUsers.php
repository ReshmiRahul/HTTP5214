<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Users</title>
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <?php require('reusables/nav.php'); ?>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <h1 class="display-4">User List</h1>
    <table class="table table-striped table-hover mt-3">
      <thead class="table-dark">
        <tr>
          <th scope="col">User ID</th>
          <th scope="col">Location</th>
          <th scope="col">Age</th>
        </tr>
      </thead>
      <tbody>
        <?php
          require('reusables/connect.php');
          $query = "SELECT `User-ID`, `Location`, `Age` FROM `users`";
          $result = mysqli_query($connect, $query);
          if ($result && mysqli_num_rows($result) > 0) {
              while ($user = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($user['User-ID']) . "</td>";
                  echo "<td>" . htmlspecialchars($user['Location']) . "</td>";
                  echo "<td>" . htmlspecialchars($user['Age']) . "</td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='3'>No users found.</td></tr>";
          }
          mysqli_close($connect);
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
