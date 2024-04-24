<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/petshop.png" type="image/x-icon"/>
    <title>User Manual: Booking Appointments</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="shortcut icon" href="./assets/images/petshop.png"type="image/x-icon"/>
    <style>
        body {
            padding: 20px;
        }

        .step {
            margin-bottom: 30px;
        }

        .step-title {
            font-size: 24px;
            color: #007bff; /* Blue */
            margin-bottom: 10px;
        }

        .step-instruction {
            font-size: 18px;
            margin-bottom: 15px;
        }

        .step-number {
            font-size: 24px;
            font-weight: bold;
            color: #28a745; /* Green */
            margin-right: 10px;
        }

        .btn-next {
            background-color: #007bff; /* Blue */
            border-color: #007bff; /* Blue */
        }

        .btn-next:hover {
            background-color: #0056b3; /* Dark blue */
            border-color: #0056b3; /* Dark blue */
        }

        a.btn.btn-warning:hover {
            background-color: #ffc107; /* Yellow */
            border-color: #ffc107; /* Yellow */
            color: #212529; /* Dark color for text */
        }

        .scroll-to-top {
            position: fixed;
            bottom: 20px;
            left: 20px;
            display: none;
            z-index: 1000;
            animation: fadeInUp 0.3s ease-in-out forwards;
            border-radius: 13px;
        }
     
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>User Manual: Booking Appointments</h1>

        <div class="step">
            <div class="step-number">1.</div>
            <div class="step-title">Create/Register an Account:</div>
            <div class="step-instruction">
                <p>Visit the registration page by clicking on the "Register" or "Create Account" link.</p>
                <p>Fill out the registration form with your details, including name, email, and password.</p>
                <p>Click the "Register" or "Sign Up" button to create your account.</p>
            </div>
        </div>

        <div class="step">
            <div class="step-number">2.</div>
            <div class="step-title">Login to Your Account:</div>
            <div class="step-instruction">
                <p>After registering, you'll be redirected to the login page.</p>
                <p>Enter your email and password in the provided fields.</p>
                <p>Click the "Login" or "Sign In" button to access your account.</p>
            </div>
        </div>

        <div class="step">
            <div class="step-number">3.</div>
            <div class="step-title">Navigate to Appointments:</div>
            <div class="step-instruction">
                <p>Once logged in, navigate to the top of the page where you'll find a menu labeled "Appointments."</p>
                <p>Click on the "Appointments" link to proceed.</p>
            </div>
        </div>

        <div class="step">
            <div class="step-number">4.</div>
            <div class="step-title">Select Desired Date on the Calendar:</div>
            <div class="step-instruction">
                <p>Upon clicking "Appointments," you'll be directed to a calendar interface displaying available dates and times.</p>
                <p>Browse through the calendar to find a suitable date for your appointment.</p>
                <p>Click on the desired date to view available appointment slots.</p>
            </div>
        </div>

        <div class="step">
            <div class="step-number">5.</div>
            <div class="step-title">Fill Out Appointment Details:</div>
            <div class="step-instruction">
                <p>After selecting a date, you'll be prompted to fill out a form with your appointment details.</p>
                <p>Provide the required information, such as your name, contact details, and any additional information requested.</p>
                <p>Double-check your entries for accuracy.</p>
            </div>
        </div>

        <div class="step">
            <div class="step-number">6.</div>
            <div class="step-title">Confirm Appointment Booking:</div>
            <div class="step-instruction">
                <p>Once you've filled out the form, review the information to ensure it's correct.</p>
                <p>If everything looks good, click on the "Confirm" or "Book Appointment" button to finalize your booking.</p>
            </div>
        </div>

        <div class="step">
            <div class="step-number">7.</div>
            <div class="step-title">View Your Appointments:</div>
            <div class="step-instruction">
                <p>After confirming your appointment, scroll to the bottom of the calendar page.</p>
                <p>You'll find a link labeled "View Appointments" or similar.</p>
                <p>Click on this link to view a table listing all your booked appointments.</p>
            </div>
        </div>

        <div class="step">
            <div class="step-number">8.</div>
            <div class="step-title">Wait for Confirmation:</div>
            <div class="step-instruction">
                <p>Once your appointment is booked, it will appear in the table of appointments.</p>
                <p>Wait for the appointment status to change from "Pending" to "Confirmed."</p>
                <p>Your name will be displayed in the table once the appointment is confirmed.</p>
            </div>
        </div>

        <div class="step">
            <div class="step-number">9.</div>
            <div class="step-title">Attend Your Confirmed Appointment:</div>
            <div class="step-instruction">
                <p>On the scheduled date and time of your appointment, make sure to attend as planned.</p>
                <p>Be prepared with any necessary documents or information requested for the appointment.</p>
            </div>
        </div>

        <a href="dashboard.php"><button class="btn btn-warning">Back</button></a>
    </div>
    
    <button class="btn btn-warning scroll-to-top" onclick="scrollToTop()">
    <i class="fas fa-angle-up"></i> <!-- Bootstrap Icon for angle-up -->
    </button>

    <script>
        // Function to scroll to the top of the page
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth' // Smooth scrolling behavior
            });
        }

        // Show or hide the scroll-to-top button based on scroll position
        window.onscroll = function() {
            var scrollBtn = document.querySelector('.scroll-to-top');
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                scrollBtn.style.display = 'block';
            } else {
                scrollBtn.style.display = 'none';
            }
        };
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>