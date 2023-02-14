<?php
    session_start();

    // verificar se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // obter os dados do formulário
        $signmail = $_POST["email"];
        $signpass = $_POST["password"];

        // conectar ao banco de dados
        require("../conect.php");

        // preparar a consulta SQL para selecionar o usuário pelo email e senha
        $stmt = mysqli_prepare($con, "SELECT * FROM logins WHERE email = ? AND password = ?");
        mysqli_stmt_bind_param($stmt, "ss", $signmail, $signpass);
        
        // executar a consulta
        mysqli_stmt_execute($stmt);

        // obter os resultados da consulta
        $result = mysqli_stmt_get_result($stmt);

        // verificar se o usuário foi encontrado
        if (mysqli_num_rows($result) == 1) {
            // armazenar o nome do usuário na variável de sessão
            $row = mysqli_fetch_assoc($result);
            $_SESSION["username"] = $row["nome"];
            
            // redirecionar para a página index.html
            header("Location: index.html");
            exit;
        } else {
            // exibir uma mensagem de erro
            echo "Login inválido.";
        }

        // fechar a conexão com o banco de dados
        mysqli_stmt_close($stmt);
        mysqli_close($con);
    }
?>



Ledge
podes traduzir esse codigo para ingles
Certainly! Here's the translation of the code:

php
Copy code
<?php
//          LOGIN

    $signmail = $_POST["email"];
    $signpass = $_POST["password"];

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