<?php
    header("Content-Type:application/json");
    include ("functions.php");

    $username = $_POST['username'] ? $_POST['username'] : 'null';
    $password = $_POST['password'] ? $_POST['password'] : 'null';

    if($username=='null'){
        deliver_response(200,"Username is empty",NULL);
        exit;
    }
    if($password=='null'){
        deliver_response(200,"Password is empty",NULL);
        exit;
    }
    $sql = "SELECT * FROM `users` WHERE `username`= '".$username."'";
    if (mysqli_query($conn, $sql)) {
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if($row['password']==$password)
                deliver_response(200,"success",$row);
            else
                deliver_response(200,"Password is wrong",NULL);
        } else {
            deliver_response(200,"Invalid username",NULL);
        }
    } else {
        deliver_response(200,"Error: " . $sql . " " . mysqli_error($conn),NULL);
    }

    mysqli_close($conn);

?>