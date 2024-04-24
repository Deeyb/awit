<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Edit Appointment</title>
    <style>
         body {
            background-image: url('https://tse3.mm.bing.net/th?id=OIP.zaq2glFCUVz1Oc1Yw-R0JwHaEo&pid=Api&P=0&h=220');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>

    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1>Edit Appointment</h1>
            <div>
                <a href="admin_dashboard.php" class="btn btn-primary">Back to Dashboard</a>
            </div>
        </header>
        <form action="process_edit_appointment.php" method="post">

        <?php 
if (isset($_GET['id'])) {
    include("connect.php");
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM appointments WHERE id = :id");
    $stmt->bindParam(":id", $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
?>
<div class="form-element my-4">
    <label for="owner_name">Owner Name:</label>
    <input type="text" class="form-control" name="owner_name" placeholder="Owner Name:" value="<?php echo htmlspecialchars($row["owner_name"]); ?>" required>
</div>
<div class="form-element my-4">
    <label for="pet_name">Pet Name:</label>
    <input type="text" class="form-control" name="pet_name" placeholder="Pet Name:" value="<?php echo htmlspecialchars($row["pet_name"]); ?>" required>
</div>
<div class="form-element my-4">
    <label for="appointment_type">Appointment Type:</label>
    <input type="text" class="form-control" name="appointment_type" placeholder="Appointment Type:" value="<?php echo htmlspecialchars($row["appointment_type"]); ?>" required>
</div>
<div class="form-element my-4">
    <label for="appointment_time">Appointment Time:</label>
    <input type="datetime-local" class="form-control" name="appointment_time" value="<?php echo htmlspecialchars(str_replace(' ', 'T', $row["appointment_time"])); ?>" required>
</div>
<div class="form-element my-4">
    <label for="contact_info">Contact Info:</label>
    <input type="text" class="form-control" name="contact_info" placeholder="Contact Info:" value="<?php echo htmlspecialchars($row["contact_info"]); ?>" required>
</div>
<div class="form-element my-4">
    <label for="status">Status:</label>
    <select name="status" class="form-control" required>
        <option value="Pending" <?php if($row["status"] == "Pending"){ echo "selected"; } ?>>Pending</option>
        <option value="Confirmed" <?php if($row["status"] == "Confirmed"){ echo "selected"; } ?>>Confirmed</option>
        <option value="Completed" <?php if($row["status"] == "Completed"){ echo "selected"; } ?>>Completed</option>
    </select>
</div>
<input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
<div class="form-element my-4">
    <input type="submit" name="edit" value="Update Appointment" class="btn btn-primary">
</div>
<?php
    } else {
        echo "<h3>Appointment not found.</h3>";
    }
    $stmt->closeCursor(); // Close the cursor to enable reusing the statement
    $conn = null; // Close the connection
} else {
    echo "<h3>No appointment ID specified.</h3>";
}
?>
        </form>
    </div>
</body>
</html>
