<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Schedule</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>body {
            background-image: url('https://png.pngtree.com/thumb_back/fh260/back_our/20190621/ourmid/pngtree-cute-orange-pet-shop-promotion-banner-image_194564.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }</style>
</head>
<body>

<div class="container my-4">
    <header class="d-flex justify-content-between my-4">
        <h1>List of Schedule</h1>
        <a href="../dashboard.php"id="backButton" class="btn btn-primary text-center mt-3">Back</a> 
    </header>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Owner Name</th>
                    <th>Pet Name</th>
                    <th>Appointment Type</th>
                    <th>Appointment Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('db_connection.php');
                try {
                    // Prepare the SQL statement
                    $sqlSelect = "SELECT * FROM appointments WHERE status = 'Confirmed'"; 
                    
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
                                <td><?php echo $data['status']; ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo '<tr><td colspan="6">No appointments found.</td></tr>';
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
</div>

<!-- Bootstrap JS (optional, if needed) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
