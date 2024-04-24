<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Appointment Details</title>
    <style>
        .appointment-details {
            background-color: #f5f5f5;
        }
        
        body {
            background-image: url('https://tse3.mm.bing.net/th?id=OIP.zaq2glFCUVz1Oc1Yw-R0JwHaEo&pid=Api&P=0&h=220');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
  

    
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Appointment Details</h1>
            <div>
                <a href="admin_dashboard.php" class="btn btn-primary">Back to Dashboard</a>
            </div>
        </header>
        <div class="appointment-details p-5 my-4">
            <?php
            include("connect.php");
            $id = $_GET['id'];
            if ($id) {
                // Use prepared statements to prevent SQL injection
                $stmt = $conn->prepare("SELECT * FROM appointments WHERE id = :id");
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($result) {
            ?>
                    <h3>Owner Name:</h3>
                    <p><?php echo htmlspecialchars($result["owner_name"]); ?></p>
                    <h3>Pet Name:</h3>
                    <p><?php echo htmlspecialchars($result["pet_name"]); ?></p>
                    <h3>Appointment Type:</h3>
                    <p><?php echo htmlspecialchars($result["appointment_type"]); ?></p>
                    <h3>Appointment Time:</h3>
                    <p><?php echo htmlspecialchars($result["appointment_time"]); ?></p>
                    <h3>Contact Info:</h3>
                    <p><?php echo htmlspecialchars($result["contact_info"]); ?></p>
                    <h3>Status:</h3>
                    <p><?php echo htmlspecialchars($result["status"]); ?></p>
            <?php
                } else {
                    echo "<h3>No appointment found</h3>";
                }
            } else {
                echo "<h3>No appointment ID specified</h3>";
            }
            ?>
        </div>
    </div>
</body>
</html>
