<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Add New Appointment</title>

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
            <h1>Add New Appointment</h1>
            <div>
            <a href="admin_dashboard.php" class="btn btn-primary">Back to Dashboard</a>
            </div>

        </header>
        
        <form action="process_new_appointment.php" method="post">

        

            <div class="form-element my-4">
                <input type="text" class="form-control" name="owner_name" placeholder="Owner Name:" required>
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="pet_name" placeholder="Pet Name:" required>
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="appointment_type" placeholder="Appointment Type:" required>
            </div>
            <div class="form-element my-4">
                <input type="datetime-local" class="form-control" name="appointment_time" placeholder="Appointment Time:" required>
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="contact_info" placeholder="Contact Info:" required>
            </div>
            <div class="form-element my-4">
                <select name="status" class="form-control" required>
                    <option value="">Select Status:</option>
                    <option value="Pending">Pending</option>
                    <option value="Confirmed">Confirmed</option>
                </select>
            </div>
            <div class="form-element my-4">
                <input type="submit" name="create_appointment" value="Add Appointment" class="btn btn-primary">
            </div>
        </form>
    </div>
    
</body>
</html>
