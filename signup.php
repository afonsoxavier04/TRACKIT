<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sign Up</title>
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

				<script>

				</script>
				<form method="post" action="forms/signup.php">
					<h3>REGISTER</h3>
					<div class="form-row">
						<input type="text" class="form-control" name="user" placeholder="*User" autocomplete="off" required>
						<input type="password" class="form-control" name="password" placeholder="*Password" autocomplete="off" onblur="passwordCheck()" required>
					</div>

                    <div class="form-row">
                        <input type="text" class="form-control" name="email" placeholder="*Email" autocomplete="off" required>
						<input type="password" class="form-control" name="c_password" placeholder="*Confirm Password" autocomplete="off" onblur="passwordCheck()" required>
                    </div>
					<p id="bola" style="display:none">a<p>
					<button>REGISTER
						<i class="zmdi zmdi-long-arrow-right"></i>
					</button>

                    <a>Already have an account?</a><a href="signin.php" class="text-center">Log In</a>
				</form>
				
			</div>
		</div>

		<script src="assets/js/jquery-3.3.1.min.js"></script>
		<script src="assets/js/main2.js"></script>
	</body>
</html>

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
    mysqli_close($con);
?>
