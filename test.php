<?php
$data = $_POST;
$servername = "localhost";
$dbname="u306265259_test";
$username = "u306265259_test";
$password = "12345678S@h";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (!mysqli_select_db($conn, $dbname)) {
    die("Database selection failed: " . mysqli_error($conn));
}
echo "Connected successfully";
// insert the data into the sensor_data table
$sql = "INSERT INTO test (sensor1, sensor2) VALUES ('" . floatval($data[sensor1]) . "', '". floatval($data[sensor2]) . "')";

if ($conn->query($sql) === TRUE) {
    echo "Sensor data stored successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
$ch = curl_init('http://localhost:5000/data');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
echo $response;