<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sign In</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="assets/css/style3.css">
	</head>

	<body>
		
		<div class="wrapper">
			<div class="inner">
				<div class="image-holder">
					<img src="assets/img/caixa.png" alt="">
				</div>
				<form method="post" action="forms/signin.php">
					<h3>Log In</h3>
					<div class="form-row">
						<input type="text" class="form-control" name="email" placeholder="Email" required>
						<input type="password" class="form-control" name="password" placeholder="Password" required>		
					</div>	
					<button>LOG IN
						<i class="zmdi zmdi-long-arrow-right"></i>
					</button>
					<i><a>Don't have an account?</a><a href="signup.php" class="text-center">create one now.</a></i>
				</form>
				
			</div>
		</div>

		<script src="assets/js/jquery-3.3.1.min.js"></script>
		<script src="assets/js/main2.js"></script>
	</body>
</html>

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