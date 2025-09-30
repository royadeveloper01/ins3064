<?php
include "connection.php";

// Initialize variables
$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;
$brand = "";
$model = "";
$price = "";
$description = "";

// Handle form submission for updating a laptop
if(isset($_POST["update"])) {
    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($link, "UPDATE laptops SET brand=?, model=?, price=?, description=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "ssdsi", $_POST['brand'], $_POST['model'], $_POST['price'], $_POST['description'], $id);
    mysqli_stmt_execute($stmt);

    // Redirect to the main page after update
    header("Location: index.php");
    exit;
}

// Fetch the existing laptop data for the form
if ($id > 0) {
    $stmt = mysqli_prepare($link, "SELECT * FROM laptops WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_array($res)) {
        $brand = $row["brand"];
        $model = $row["model"];
        $price = $row["price"];
        $description = $row["description"];
    }
}
?>

<html lang="en" xmlns="">
<head>
    <title>Edit Laptop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="col-lg-4">
        <h2>Edit Laptop Details</h2>
        <form action="edit.php?id=<?php echo $id; ?>" name="form1" method="post">
            <div class="form-group">
                <label for="brand">Brand:</label>
                <input type="text" class="form-control" id="brand" placeholder="Enter brand" name="brand" value="<?php echo htmlspecialchars($brand); ?>" required>
            </div>
            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" class="form-control" id="model" placeholder="Enter model" name="model" value="<?php echo htmlspecialchars($model); ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" class="form-control" id="price" placeholder="Enter price" name="price" value="<?php echo htmlspecialchars($price); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" placeholder="Enter description" name="description"><?php echo htmlspecialchars($description); ?></textarea>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-default">Cancel</a>
        </form>
    </div>
</div>

</body>
</html>