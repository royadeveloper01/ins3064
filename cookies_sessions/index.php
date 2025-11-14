<?php // index.php

if (isset($_COOKIE['username'])) {
    // Security fix: Sanitize output to prevent XSS attacks.
    $username = htmlspecialchars($_COOKIE['username']);
    echo "Welcome, " . $username . "!<br/>";
?>
    <form action="removeCookie.php" method="post">
        <input type="submit" value="Remove Cookie" />
    </form>
<?php
} else {
?>
    <form action="setCookie.php" method="post">
        User name: <input type="text" name="username" />
        <input type="submit" value="Set Cookie" />
    </form>
<?php
}
?>