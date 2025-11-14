<?php  

include('include/connect.php');

$query = "SELECT affiliate_ID, reward FROM profile";
$result = mysqli_query($link, $query);

if (!$result) {
    die('Query failed: ' . mysqli_error($link));
}

while ($row = mysqli_fetch_assoc($result)) {  
    $l1=$row["l1"];
    $reward = $row["reward"] + 140;
    $id = $row["affiliate_ID"]; // Assuming 'affiliate_ID' is the correct column name for the ID

    $updateQuery = "UPDATE profile SET reward='$reward' WHERE affiliate_ID = '$id'";

    if (mysqli_query($link, $updateQuery)) {
        echo "<script type='text/javascript'>alert('Profile Updated...');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Error updating record: " . mysqli_error($link) . "');</script>";
    }
}

?>
