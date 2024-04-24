<?php

include 'connect.php';

// Check if the form was submitted
if (isset($_POST['create_appointment'])) {
    // Extract form data
    $owner_name = $_POST['owner_name'];
    $pet_name = $_POST['pet_name'];
    $appointment_type = $_POST['appointment_type'];
    $appointment_time = $_POST['appointment_time'];
    $contact_info = $_POST['contact_info'];
    $status = $_POST['status'];

    try {
        // Insert data into the database using prepared statements
        $stmt = $conn->prepare("INSERT INTO appointments (owner_name, pet_name, appointment_type, appointment_time, contact_info, status) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$owner_name, $pet_name, $appointment_type, $appointment_time, $contact_info, $status]);

        // Redirect to a confirmation page or back to the form with a success message
        header('Location: admin_dashboard.php?success=Appointment updated');
        exit;
    } catch(PDOException $e) {
        // Display an error message if query fails
        echo "Query failed: " . $e->getMessage();
    }
}
?>
