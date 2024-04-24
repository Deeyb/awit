<?php include 'connect.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
         body {
            background-image: url('https://tse3.mm.bing.net/th?id=OIP.zaq2glFCUVz1Oc1Yw-R0JwHaEo&pid=Api&P=0&h=220');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        body {
            padding: 20px;
        }

        .card {
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .card-body {
            text-align: center;
        }

        .card-title {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 36px;
            color: #2c3e50; /* Dark blue */
        }
    </style>
</head>
<body>
<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');  // Redirect to login page if not logged in
    exit();
}

echo "<h1>Welcome, " . $_SESSION['user_email'] . "</h1>";
?>
    <div class="container">
        <h1 class="mb-4">Admin Dashboard</h1>
        <a href="logout.php" class="btn btn-warning">Log Out</a>
        <a href="admin_dashboard.php    " class="btn btn-secondary">Back</a>
        <div class="row pt-5">
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-clock"></i> Pending Appointments</h5>
                        <?php
                        // Count pending appointments
                        $stmt = $conn->prepare("SELECT COUNT(*) AS pending_count FROM appointments WHERE status = 'Pending'");
                        $stmt->execute();
                        $pending_result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $pending_count = $pending_result['pending_count'];
                        ?>
                        <p class="card-text"><?php echo $pending_count; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-check-circle"></i> Confirmed Appointments</h5>
                        <?php
                        // Count confirmed appointments
                        $stmt = $conn->prepare("SELECT COUNT(*) AS confirmed_count FROM appointments WHERE status = 'Confirmed'");
                        $stmt->execute();
                        $confirmed_result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $confirmed_count = $confirmed_result['confirmed_count'];
                        ?>
                        <p class="card-text"><?php echo $confirmed_count; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-calendar-check"></i> Completed Appointments</h5>
                        <?php
                        // Count completed appointments
                        $stmt = $conn->prepare("SELECT COUNT(*) AS completed_count FROM appointments WHERE status = 'Completed'");
                        $stmt->execute();
                        $completed_result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $completed_count = $completed_result['completed_count'];
                        ?>
                        <p class="card-text"><?php echo $completed_count; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-times-circle"></i> Canceled Appointments</h5>
                        <?php
                        // Count canceled appointments
                        $stmt = $conn->prepare("SELECT COUNT(*) AS canceled_count FROM appointments WHERE status = 'Canceled'");
                        $stmt->execute();
                        $canceled_result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $canceled_count = $canceled_result['canceled_count'];
                        ?>
                        <p class="card-text"><?php echo $canceled_count; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
