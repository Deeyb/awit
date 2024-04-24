<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Inquiry Form</title>
    <link rel="shortcut icon" href="./assets/img/petshop.png" type="image/x-icon"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php
// Include database connection file
include 'connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare an SQL statement to check if the inquiry already exists
    $check_sql = "SELECT * FROM inquiries WHERE name = :name AND email = :email AND message = :message";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bindParam(':name', $_POST['name']);
    $check_stmt->bindParam(':email', $_POST['email']);
    $check_stmt->bindParam(':message', $_POST['message']);
    $check_stmt->execute();
    
    if ($check_stmt->rowCount() > 0) {
        echo '<div class="alert alert-success" role="alert">Your inquiry has already been submitted!</div>';
    } else {
        // Prepare an SQL statement to insert the inquiry into the database
        $sql = "INSERT INTO inquiries (name, email, message) VALUES (:name, :email, :message)";
        
        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);
        
        // Bind parameters
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':message', $_POST['message']);
        
        // Execute the SQL statement
        if ($stmt->execute()) {
             echo '<div class="alert alert-success" role="alert">Your inquiry has already been submitted!</div>';
        } else {
            echo "Error: Unable to submit your inquiry.";
        }
    }
}
?>

<body>
    <div class="container">
        <h2 class="my-4">User Inquiry Form</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="message" class="form-label">Message:</label>
                <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div class="mt-4">
    <a href="dashboard.php" class="btn btn-primary">Back</a>
</div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
