<!DOCTYPE html>
<html>
<head>
    <title>Budget Tracker</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Budget Tracker</h1>
        <form action="add_expense.php" method="POST">
            <input type="text" name="expense" placeholder="Expense" required>
            <input type="number" name="amount" placeholder="Amount" step="0.01" required>
            <button type="submit">Add Expense</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Expense</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Fetching data from the database
                    $conn = mysqli_connect("localhost", "root", "", "hci");
                    $result = mysqli_query($conn, "SELECT * FROM budget");
                    $total = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>".$row['expense']."</td>
                                <td>".$row['amount']."</td>
                                <td>
                                    <a href='edit_expense.php?id=".$row['id']."'>Edit</a> |
                                    <a href='delete_expense.php?id=".$row['id']."'>Delete</a>
                                </td>
                              </tr>";
                        $total += $row['amount'];
                    }
                ?>
            </tbody>
        </table>
        <div class="total">
            <label>Total:</label>
            <span><?php echo $total; ?></span>
        </div>
    </div>
</body>
</html>
