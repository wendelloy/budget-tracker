<?php
    // Inserting data into the database
    $conn = mysqli_connect("localhost", "root", "", "hci");
    $expense = $_POST['expense'];
    $amount = $_POST['amount'];
    $query = "INSERT INTO budget (expense, amount) VALUES ('$expense', '$amount')";
    mysqli_query($conn, $query);
    header("Location: index.php");
?>
