<?php
    header("Content-Type:application/json");
    include("functions.php");

    $sql = "SELECT * FROM beacons WHERE isWanted = '1'";
    if(mysqli_query($conn, $sql)){
        $result = $conn -> query ($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            deliver_response(200,'success',$row);
        }
        else {
            deliver_response(200,'no such beacon',NULL);
        }
    }
    mysqli_close($conn);
?>
