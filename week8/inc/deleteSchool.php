<?php
if (isset($_POST['id'])) {
    $schoolID = $_POST['id'];

    require('../reusables/connect.php');

    $schoolID = mysqli_real_escape_string($connect, $schoolID);

    $query = "DELETE FROM public_school_contact_list_may2024_en WHERE id = '$schoolID'";

    $result = mysqli_query($connect, $query);

    if ($result) {
        header("Location: ../index.php");
    } else {
        echo "Error deleting school: " . mysqli_error($connect);
    }
} else {
    echo "No school ID provided.";
}
?>
