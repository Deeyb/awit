<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Appointment List</title>
    <style>
        table  td, table th{
        vertical-align:middle;
        text-align:right;
        padding:20px!important;
        }
        
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Appointment List</h1>
            <div>
            <a href="admin.php" class="btn btn-primary">Admin List</a>
                <a href="create_appointment.php" class="btn btn-primary">Add New Appointment</a>
                <a href="logout.php" class="btn btn-primary">Log Out</a>
            </div>
        </header>
        <!-- Success and error messages here -->
        
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Owner Name</th>
                <th>Pet Name</th>
                <th>Appointment Type</th>
                <th>Appointment Time</th>
                <th>Contact Info</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        
        <?php
        include('connect.php');
        try {
            // Prepare the SQL statement
            $sqlSelect = "SELECT * FROM appointments"; 
            
            // Execute the SQL statement
            $result = $conn->query($sqlSelect);
            
            if ($result->rowCount() > 0) {
                // Fetch and display appointment data
                while($data = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['owner_name']; ?></td>
                        <td><?php echo $data['pet_name']; ?></td>
                        <td><?php echo $data['appointment_type']; ?></td>
                        <td><?php echo $data['appointment_time']; ?></td>
                        <td><?php echo $data['contact_info']; ?></td>
                        <td><?php echo $data['status']; ?></td>
                        <td>
                            <a href="view_appointment.php?id=<?php echo $data['id']; ?>" class="btn btn-info">Read More</a>
                            <a href="edit_appointment.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete_appointment.php?id=<?php echo $data['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this appointment?');">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo '<tr><td colspan="8">No appointments found.</td></tr>';
            }
        } catch(PDOException $e) {
            // Display an error message if query fails
            echo "Query failed: " . $e->getMessage();
        }

        // Close the database connection (optional as PDO automatically closes the connection when the script ends)
        $conn = null;
        ?>
        </tbody>
        </table>
    </div>
</body>
</html>
