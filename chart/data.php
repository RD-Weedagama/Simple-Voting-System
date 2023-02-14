<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","vote");

$sqlQuery = "SELECT id,email,vote FROM vote ORDER BY id";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>