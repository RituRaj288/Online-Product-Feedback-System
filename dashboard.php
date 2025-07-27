<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
echo "<h2>Welcome! <a href='products.php'>View Products</a> | <a href='logout.php'>Logout</a></h2>";
?>