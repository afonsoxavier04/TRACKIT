<?php
//          REGISTER

    $reguser = $_POST["user"];
    $regmail = $_POST["email"];
    $reggnpass = $_POST["password"];~
    $regc_pass = $_POST["c_password"];

//          DATABASE CONNECTION

    require("../conect.php");

    $stmt = mysqli_prepare($con, "INSERT INTO logins (nome, email, password) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $reguser, $regmail, $reggnpass);

    if (mysqli_stmt_execute($stmt)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
    
?>