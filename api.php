### put this file on your public_html directory so it will be accesible
### access this file url in your python syntax
### use the same parameter in your python syntax to post data


<?php

$servername = "localhost";

// REPLACE with your Database name
$dbname = "your db name";
// REPLACE with Database user
$username = "you username ";
// REPLACE with Database user password
$password = "your password";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "9F7j3bA5TAmPt";

$api_key= $jenis_sampah = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $jenis_sampah = test_input($_POST["jenis_sampah"]);
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO sampah (jenis_sampah)
        VALUES ('" . $jenis_sampah . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
