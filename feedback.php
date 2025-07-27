<?php
include 'db/config.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

$product_id = $_GET['product_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
    $user_id = $_SESSION['user'];

    $sql = "INSERT INTO feedback (user_id, product_id, rating, comment) 
            VALUES ('$user_id', '$product_id', '$rating', '$comment')";

    if ($conn->query($sql)) {
        echo "Feedback submitted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">
    <input type="number" name="rating" max="5" min="1" required placeholder="Rating (1-5)"><br>
    <textarea name="comment" required placeholder="Your feedback"></textarea><br>
    <button type="submit">Submit Feedback</button>
</form>