<?php
    header("Content-Type:application/json");
    include ("functions.php");
    
    $mac = $_POST['mac'] ? $_POST['mac'] : 'null';    
    
    if($mac=='null'){
        deliver_response(200,"MAC is empty",NULL);
        exit;
    }

    $sql = "SELECT isWanted FROM beacon WHERE mac = '$mac'";
    if (mysqli_query($conn, $sql)) {
        $result = $conn -> query ($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            deliver_response(200,'success',$row);
        }
        else {
            deliver_response(200,'no such beacon',NULL);
        }
    } else {
        deliver_response(200,"Error: " . $sql . " " . mysqli_error($conn),NULL);
    }
    
    mysqli_close($conn);

?>