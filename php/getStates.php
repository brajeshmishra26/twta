<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $country_id = $_POST['country_id'];

    $sql = "SELECT * FROM states WHERE country_id='$country_id'";
    $result = $conn->query($sql);
    $states = array();

    while ($row = $result->fetch_assoc()) {
        $states[] = $row;
    }

    echo json_encode($states);
    $conn->close();
}
?>
