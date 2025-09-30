<?php
include "connection.php";

// Handle form submission for inserting a new laptop
if(isset($_POST["insert"]))
{
    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($link, "INSERT INTO laptops (brand, model, price, description) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssds", $_POST['brand'], $_POST['model'], $_POST['price'], $_POST['description']);
    mysqli_stmt_execute($stmt);

    // Refresh the page to show the new entry
    header("Location: index.php");
    exit;
}
?>

<html lang="en" xmlns="">
<head>
    <title>Laptop Store Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="col-lg-4">
        <h2>Add New Laptop</h2>
        <form action="index.php" name="form1" method="post">
            <div class="form-group">
                <label for="brand">Brand:</label>
                <input type="text" class="form-control" id="brand" placeholder="Enter brand" name="brand" required>
            </div>
            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" class="form-control" id="model" placeholder="Enter model" name="model" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" class="form-control" id="price" placeholder="Enter price" name="price" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" placeholder="Enter description" name="description"></textarea>
            </div>
            <button type="submit" name="insert" class="btn btn-primary">Add Laptop</button>
        </form>
    </div>
</div>

<!-- Laptop records table -->
<div class="col-lg-12">
    <h2>Available Laptops</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Price</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $res = null;
        if (!empty($link)) {
            $res = mysqli_query($link, "SELECT * FROM laptops");
        }
        if ($res) {
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["brand"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["model"]) . "</td>";
                echo "<td>$" . htmlspecialchars(number_format($row["price"], 2)) . "</td>";
                echo "<td>" . htmlspecialchars($row["description"]) . "</td>";
                echo "<td><a href='edit.php?id=" . htmlspecialchars($row["id"]) . "'><button type='button' class='btn btn-success'>Edit</button></a></td>";
                echo "<td><a href='delete.php?id=" . htmlspecialchars($row["id"]) . "'><button type='button' class='btn btn-danger'>Delete</button></a></td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>