<?php

  header("Content-Type:application/json");
  include("functions.php");

  $mac = $_POST['mac'] ? $_POST['mac'] : 'null';
  $latitude = $_POST['latitude'] ? $_POST['latitude'] : 'null';
  $longtitude = $_POST['longtitude'] ? $_POST['longtitude'] : 'null';
  $lastseen = $_POST['lastseen'] ? $_POST['lastseen'] : 'null';

  if($mac == 'null'){
    deliver_response(200,"Mac is empty", NULL);
    exit;
  }
  if($latitude == 'null'){
    deliver_response(200,"Latitude is empty", NULL);
    exit;
  }
  if($longtitude == 'null'){
    deliver_response(200,"longtitude is empty", NULL);
    exit;
  }
  if($lastseen == 'null'){
    deliver_response(200,"lastseen is empty", NULL);
    exit;
  }
    
  $sql = "UPDATE beacon SET latitude = '$latitude', longtitude = '$longtitude', lastseen = '$lastseen' WHERE mac = '$mac';";
  if (mysqli_query($conn, $sql))
    deliver_response(200, "success", NULL);
  else
    deliver_response(200, "Error: " . $sql . " " . mysqli_error($conn), NULL);
  mysqli_close($conn);
?>
