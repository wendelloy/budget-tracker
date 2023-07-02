<?php
    // Deleting an expense from the database
    $conn = mysqli_connect("localhost", "root", "", "hci");
    $id = $_GET['id'];
    $query = "DELETE FROM budget WHERE id = '$id'";
    mysqli_query($conn, $query);
    header("Location: index.php");
?>
