<?php
//removeCookie.php

// Set the cookie's expiration to a time in the past to delete it.
setcookie("username", "", time() - 3600, "/");
echo 'Cookie removed successfully.<br/>';
echo 'Click <a href="index.php">here</a> to go back.';
?>