<?php
include "connection.php";

// Sanitize the ID from GET or POST to ensure it's an integer
$id = 0;
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
} elseif (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}

// If no valid ID is provided, redirect to the main page
if ($id <= 0) {
    header("Location: index.php");
    exit;
}

// --- Handle POST request (User has confirmed deletion) ---
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_delete'])) {
    // Use a prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($link, "DELETE FROM table1 WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    // Redirect back to the main page after deletion
    header("Location: index.php");
    exit; // Always exit after a header redirect
}

// --- Handle GET request (Show confirmation page) ---
$user = null;
// Use a prepared statement to safely fetch user details
$stmt = mysqli_prepare($link, "SELECT firstname, lastname FROM table1 WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($res)) {
    $user = $row;
} else {
    // If user not found, redirect
    header("Location: index.php");
    exit;
}
?>

<html lang="en">
<head>
    <title>Confirm Deletion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .confirmation-box {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            text-align: center;
            max-width: 500px;
        }
        .confirmation-box h2 { margin-top: 0; color: #d9534f; }
        .confirmation-box p { font-size: 16px; margin: 20px 0; }
        .btn { margin: 0 10px; padding: 10px 25px; font-weight: 600; }
    </style>
</head>
<body>

<div class="container">
    <div class="confirmation-box">
        <h2>Confirm Deletion</h2>
        <p>Are you sure you want to delete the user: <br><strong><?php echo htmlspecialchars($user['firstname']) . ' ' . htmlspecialchars($user['lastname']); ?></strong>?</p>
        <p>This action cannot be undone.</p>
        <form action="delete.php" method="post" style="display: inline;">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" name="confirm_delete" class="btn btn-danger">Yes, Delete</button>
        </form>
        <a href="index.php" class="btn btn-default">No, Cancel</a>
    </div>
</div>

</body>
</html>