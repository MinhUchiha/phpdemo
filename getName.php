<?php
header('Content-Type: application/json');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$year = $_GET["year"];
$month = $_GET["year"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name FROM test WHERE year = '" .$year ."'";
$result = $conn->query($sql);

$return_object = array();
$array_return = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $obj = array(
            "id" => $row["id"],
            "name" => $row["name"]
        );
        array_unshift($array_return, $obj);
    }
}
$return_object = array(
    "array1" => $array_return,
    "array2" => $array_return
);
$conn->close();

echo json_encode($return_object);
?>