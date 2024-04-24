<?php
header('Content-Type: application/json');
$host = 'localhost';
$dbname = 'my_db';
$username = 'root';
$password = '';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT id, owner_name, pet_name, appointment_type, appointment_time FROM appointments WHERE status = 'confirmed'";
$stmt = $conn->prepare($query);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$events = array();
foreach ($results as $row) {
    $e = array();
    $e['title'] = $row['appointment_type'] . ' - ' . $row['pet_name'];
    $e['start'] = $row['appointment_time'];
    $e['allDay'] = false;  // FullCalendar event property for non-all-day events

    array_push($events, $e);
}

echo json_encode($events);
?>
