<?php
include("connect.php");
session_start(); // Start the session at the very beginning

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE appointments SET status = 'Inactive' WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Bind the parameter

    if ($stmt->execute()) {
        $_SESSION["delete"] = "Appointment Marked as Inactive Successfully!";
        $stmt->closeCursor(); // Close the cursor to enable re-execution of the statement
        $conn = null; // Close the database connection
        header("Location: admin_dashboard.php"); // Redirect to the dashboard
        exit(); // Don't forget to call exit() after header()
    } else {
        $stmt->closeCursor(); // Close the cursor to enable re-execution of the statement
        $conn = null; // Close the database connection
        die("Something went wrong while marking the appointment as inactive.");
    }
} else {
    echo "Appointment does not exist or no ID was specified.";
}
?>


