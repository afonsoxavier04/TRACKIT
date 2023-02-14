<?php
//          REGISTER

    $reguser = $_POST["user"];
    $reggnpass = $_POST["password"];~
    $regc_pass = $_POST["c_password"];

//          DATABASE CONNECTION

    require("../conect.php");

    $stmt = mysqli_prepare($con, "SELECT * FROM logins");
    mysqli_stmt_bind_param($stmt, $logname, $logmail, $logpass);

    if (mysqli_stmt_execute($stmt)) {
        echo "Record inserted successfully";
        echo $stmt;
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
    
?>