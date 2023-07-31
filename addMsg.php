
<?php
session_start();
include "db.php";
$msg = $_GET["msg"];
$phone = $_SESSION["phone"];

 // Check if the message field is empty
 if ($msg === "" ) {
      
 }

 else {

    $q = "SELECT * FROM `users` WHERE phone='$phone'";
    if ($rq = mysqli_query($db, $q)) {
      if (mysqli_num_rows($rq) == 1) {

        $q = "INSERT INTO `msg`(`phone`, `msg`) VALUES ('$phone','$msg')";
        $rq = mysqli_query($db, $q);


      }
    }
 }

?>