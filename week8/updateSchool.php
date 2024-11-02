<?php
 include('inc/functions.php');
 secure();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <?php require('reusables/nav.php') ?>
      </div>
    </div>
  </div>
  <?php 
        require('reusables/connect.php');
        $schoolID = $_GET['id'];
        $query = "SELECT * FROM public_school_contact_list_may2024_en WHERE `id` = '$schoolID'";
        $school = mysqli_query($connect, $query);

        $result = $school -> fetch_assoc();
        
      ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="display-4"><?php echo $result['School Name'] ?></h1>
      </div>
    </div>
    <div class="row">
    </div>
    <div class="row">
      <div class="col-md-5">
      <form method="POST" action="inc/updateScript.php">
        <div class="mb-3">
          <label for="schoolName" class="form-label">School Name</label>
          <input type="text" class="form-control" id="schoolName" name="schoolName"
          value="<?php echo $result['School Name']; ?>">
        </div>

        <div class="mb-3">
          <label for="schoolType" class="form-label">School Type</label>
          <input type="text" class="form-control" id="schoolType" name="schoolType" value="<?php echo $result['School Type']; ?>">
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email"value="<?php echo $result['Email']; ?>">
        </div>

        <div class="mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $result['Phone']; ?>">
        </div>
        
        <input type="hidden" name="id" value="<?php echo $result['id'] ?>">

        <button type="submit" class="btn btn-primary" name="updateSchool">Submit</button>

      </form>
      </div>
    </div>
  </div>
</body>
</html>