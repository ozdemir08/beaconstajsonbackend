<?php
    header("Content-Type:application/json");
    include ("functions.php");

    $mac = $_POST['mac'] ? $_POST['mac'] : 'null';
    $beacon_name = $_POST['beacon_name'] ? $_POST['beacon_name'] : 'null';
    $photo = $_POST['photo'] ? $_POST['photo'] : 'null';
    $icon = $_POST['icon'] ? $_POST['icon'] : 'null';
    $user_id = $_POST['user_id'] ? $_POST['user_id'] : 0;

    if($mac=='null'){
        deliver_response(200,"MAC is empty",NULL);
        exit;
    }
    if($beacon_name=='null'){
        deliver_response(200,"Beacon Name is empty",NULL);
        exit;
    }
    if($user_id==0){
        deliver_response(200,"User ID is empty",NULL);
        exit;
    }
    $sql = "INSERT INTO `beacon` (`mac`, `beacon_name`, `photo`, `icon`, `user_id`) VALUES ('".$mac."', '".$beacon_name."', '".$photo."', '".$icon."', '".$user_id."');";
    if (mysqli_query($conn, $sql)) {
        deliver_response(200,"success",NULL);
    } else {
        deliver_response(200,"Error: " . $sql . " " . mysqli_error($conn),NULL);
    }

    mysqli_close($conn);

?>