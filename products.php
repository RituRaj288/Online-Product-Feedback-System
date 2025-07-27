<?php
include 'db/config.php';
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

$result = $conn->query("SELECT * FROM products");

while ($row = $result->fetch_assoc()) {
    echo "<div>
        <h3>{$row['name']}</h3>
        <p>{$row['description']}</p>
        <a href='feedback.php?product_id={$row['id']}'>Give Feedback</a>
    </div><hr>";
}
?>