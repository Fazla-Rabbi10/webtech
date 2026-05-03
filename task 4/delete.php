<?php
include 'db.php';
$conn = db_connect();

$id = $_GET['id'];

$sql = "DELETE FROM students WHERE id=$id";

if(mysqli_query($conn, $sql)){
    header("Location: index.php");
}
?>