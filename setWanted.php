<?php
    header("Content-Type:application/json");
    include ("functions.php");

    $mac = $_POST['mac'] ? $_POST['mac'] : 'null';
    $isWanted = $_POST['isWanted'] ? $_POST['isWanted'] : 'null';


    if($mac=='null'){
        deliver_response(200,"MAC is empty",NULL);
        exit;
    }
    if($isWanted=='null'){
        deliver_response(200,"Beacon Name is empty",NULL);
        exit;
    }

    $sql = "UPDATE `beacon` SET `isWanted` = '$isWanted' WHERE `beacon`.`mac` = '$mac';";
    if (mysqli_query($conn, $sql)) {
        deliver_response(200,"success",NULL);
    } else {
        deliver_response(200,"Error: " . $sql . " " . mysqli_error($conn),NULL);
    }

    mysqli_close($conn);

?>