<?php
    // Fetching the expense details from the database
    $conn = mysqli_connect("localhost", "root", "", "hci");
    $expense_id = $_GET['id'];
    $query = "SELECT * FROM budget WHERE id = '$expense_id'";
    $result = mysqli_query($conn, $query);
    $expense = mysqli_fetch_assoc($result);

    // Handling the form submission to update the expense
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newExpense = $_POST['expense'];
        $newAmount = $_POST['amount'];
        $updateQuery = "UPDATE budget SET expense = '$newExpense', amount = '$newAmount' WHERE id = '$expense_id'";
        mysqli_query($conn, $updateQuery);
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Expense</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Expense</h1>
        <form action="edit_expense.php?id=<?php echo $expense_id; ?>" method="POST">
            <input type="text" name="expense" placeholder="Expense" value="<?php echo $expense['expense']; ?>" required>
            <input type="number" name="amount" placeholder="Amount" step="0.01" value="<?php echo $expense['amount']; ?>" required>
            <button type="submit">Update Expense</button>
        </form>
    </div>
</body>
</html>
