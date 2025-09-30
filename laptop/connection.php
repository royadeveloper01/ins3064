<?php
//creating a database connection - $link is a variable use for just connection class
$link = mysqli_connect("127.0.0.1", "root", "");
if (!$link) {
	die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db($link, "LaptopStore") or die(mysqli_error($link));
