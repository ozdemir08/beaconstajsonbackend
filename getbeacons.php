<?php
    header("Content-Type:application/json");
    include ("functions.php");

    $user_id = $_POST['user_id'] ? $_POST['user_id'] : 0;
    $array= array();

    if($user_id == 0){
        deliver_response(200,"User ID is empty",NULL);
        exit;
    }
    $sql = "SELECT * FROM `beacon` WHERE `user_id`= '".$user_id."'";
    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($array,$row);
            }
            deliver_response(200,"success",$array);
        } else {
            deliver_response(200,"No beacons",NULL);
        }
    } else {
        deliver_response(200,"Error: " . $sql . " " . mysqli_error($conn),NULL);
    }

    mysqli_close($conn);

?>