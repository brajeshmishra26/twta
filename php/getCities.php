<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $state_id = $_POST['state_id'];

    $sql = "SELECT * FROM cities WHERE state_id='$state_id'";
    $result = $conn->query($sql);
    $cities = array();

    while ($row = $result->fetch_assoc()) {
        $cities[] = $row;
    }

    echo json_encode($cities);
    $conn->close();
}
?>
