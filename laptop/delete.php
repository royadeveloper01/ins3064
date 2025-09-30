<?php
include "connection.php";

// Get the ID from the URL and ensure it's an integer
$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

if ($id > 0) {
    // Use a prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($link, "DELETE FROM laptops WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
}

// Redirect back to the main page
header("Location: index.php");
exit; // It's good practice to call exit() after a header redirect
?>
