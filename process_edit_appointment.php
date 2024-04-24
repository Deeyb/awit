<?php
include 'connect.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $owner_name = $_POST['owner_name'];
    $pet_name = $_POST['pet_name'];
    $appointment_type = $_POST['appointment_type'];
    $appointment_time = $_POST['appointment_time'];
    $contact_info = $_POST['contact_info'];
    $status = $_POST['status'];

    try {
        // Prepare and execute the SQL update statement
        $stmt = $conn->prepare("UPDATE appointments SET owner_name = :owner_name, pet_name = :pet_name, appointment_type = :appointment_type, appointment_time = :appointment_time, contact_info = :contact_info, status = :status WHERE id = :id");
        $stmt->bindParam(':owner_name', $owner_name);
        $stmt->bindParam(':pet_name', $pet_name);
        $stmt->bindParam(':appointment_type', $appointment_type);
        $stmt->bindParam(':appointment_time', $appointment_time);
        $stmt->bindParam(':contact_info', $contact_info);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Check if any rows were affected
        if ($stmt->rowCount() === 0) {
            echo 'No rows updated';  
        } else {
            // Redirect to the index2.php page with a success message
            header('Location: admin_dashboard.php?success=Appointment updated');
            exit;
        }

        // Close the cursor to enable re-execution of the statement
        $stmt->closeCursor();
    } catch(PDOException $e) {
        // Display an error message if query fails
        echo "Query failed: " . $e->getMessage();
    }
} else {
    // Redirect if the 'edit' form was not submitted
    header('Location: edit_appointment.php');
    exit;
}

// Close the database connection
$conn = null;
?>
