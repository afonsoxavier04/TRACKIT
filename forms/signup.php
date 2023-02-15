<?php
    session_start();

    // Verifica se o usuário está logado
    if (isset($_SESSION['user_id'])) {
        echo "Usuário logado com sucesso!";
        // faça o que deseja para usuário logado
    } else {
        echo "Usuário não está logado";
        // redirecione para a página de login
    }

    // Registro do usuário
    $reguser = $_POST["user"];
    $regmail = $_POST["email"];
    $reggnpass = $_POST["password"];
    $regc_pass = $_POST["c_password"];

    require("../conect.php");

    // Insere o novo user na base de dados
    $stmt = mysqli_prepare($con, "INSERT INTO logins (nome,email,password) VALUES (?,?,?)");
    mysqli_stmt_bind_param($stmt, "sss", $reguser, $regmail, $reggnpass);
 
    if (mysqli_stmt_execute($stmt)) {
        // Obtem o ID do user recém-criado
        $user_id = mysqli_insert_id($con);
        // Define a sessão para o user
        $_SESSION['user_id'] = $user_id;
        echo "Record inserted successfully";
        header("Location: ../signin.html");
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);*/
?>
