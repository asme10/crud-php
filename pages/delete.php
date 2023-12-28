<?php
include "../db/db_conn.php";

$id = $_GET['id'];
$sql = "DELETE FROM `students` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: ../index.php");
    exit();
} else {
    error_log("Failed to delete student: " . mysqli_error($conn));
    header("Location: index.php?msg=Failed to delete student. Please try again.");
    exit();
}
