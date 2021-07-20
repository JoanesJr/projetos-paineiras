<?php 

    $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;

?>

<!doctype html>
<html lang="pt-br">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/styleadmin.css">

  

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg_2.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Faça Login para Continuar</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<form action="app/validacao_admin.php" class="signin-form" method="post">
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Usuario"  name="user" id="user">
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" placeholder="Senha"  name="password">
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
                <div class="text-center">
                <button type="submit" class="btn btn-outline-dark btn-lg text-white border-white" id="sendForm">Fazer Login</button>
                </div> 
	          </form> <br> <br>

              <?php
                if ($erro == '1') {
              ?>
                <div class="alert alert-danger">
                    Usuario e/ou Senha incorretos!
                </div>
             <?php
                }else if ($erro == '2') {
            ?>
                <div class="alert alert-danger">
                    Faça Login para acessar o administrador!
                </div>
             <?php
                }
            ?>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script>
        $(document).ready( function() {
            $('#sendForm').click( function() {
                let controll = false;
                if ($('#user').val() == '') {
                    $('#user').css({'border-color' : 'red'})
                    controll = true;
                }else {
                    $('#user').css({'border' : 'none'})
                };

                if ($('#password-field').val() == '') {
                    $('#password-field').css({'border-color' : 'red'})
                    controll = true;
                }else {
                    $('#password-field').css({'border' : 'none'})
                };

                if(controll) return false;
            })
        });
    </script>

	</body>
</html>

