<?php
//          LOGIN

    $signmail = $_POST("logemail");
    $signpass = $_POST("logpass");



//          REGISTER

    $logname = $_POST("logname");
    $logmail = $_POST("logemail");
    $logpass = $_POST("logpass");


//          DATABASE CONNECTION

    $con = mysqli_connect("localhost","root","","trackit");

    $stmt = mysqli_prepare($con, "INSERT INTO logins(email,password) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, $logmail, $logpass);

    if (mysqli_stmt_execute($stmt)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
    
?>