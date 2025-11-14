<?php
//setCookie.php

// Security best practice: Sanitize input before using it.
if (isset($_POST['username']) && !empty(trim($_POST['username']))) {
    $username = htmlspecialchars($_POST['username']);
    setcookie("username", $username, time() + 3600, "/"); // Set for 1 hour
    echo 'Cookie set successfully!<br/>';
    echo 'Click <a href="index.php">here</a> to go back.';
}
?>