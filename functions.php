<?php
    $servername = "localhost";
    $user = "root";
    $pass = "123";
    $dbname = "beaconapp";

    $conn = mysqli_connect($servername,$user,$pass,$dbname);

    if(!$conn)
    {
        deliver_response(400,"Database connection error",NULL);
        exit;
    }

    function deliver_response($status,$status_message,$data){
        header("HTTP/1.1 $status $status_message");
        $response['status']=$status;
        $response['status_message']=$status_message;
        $response['data']=$data;
    
        $json_response = json_encode($response);
        echo $json_response;
    }
?>