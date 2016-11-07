<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Mini Blog IFSC - Garopaba</title>
		<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
		<link rel="shortcut icon" href="img/logogoogle.png" />
		<script src="lib/js/bootstrap.min.js"></script>
		<style>
			body{
				background-image: url("img/image.png");
				background-size: cover;
				background-color:#337ab7;
			}
			.container{
				background-color:white;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<!-- cabeçalho -->
				<header class="jumbotron">
					<h1>Mini Blog</h1>
				</header>
				<!-- menu de navegação -->
				<nav class="navbar navbar-inverse">
					<div class="navbar-header">
						<a class="navbar-brand" href="index.php?c=Post&p=principal">Principal</a>
						<a class="navbar-brand" href="index.php?c=Post&p=listar">Lista de Posts</a>
						<a class="navbar-brand" href="index.php?c=Post&p=cadastrar">Cadastrar Post</a>	
						<a class="navbar-brand" href="index.php?c=Usuarios&p=cadastrar">Cadastrar Usuario</a>
					</div>
					<ul class="nav navbar-nav pull-right">
						<?php 
						if(isset($_SESSION['usuario'])){
						$u = new Usuarios($_SESSION['usuario']);
						?>
						<li><a href="index.php?c=Usuarios&p=login">Bem Vindo <?php echo $u->nome?></a></li>
						<li><a href="index.php?c=Usuarios&p=logout">Logout Usuario</a></li>
						<?php } else{?>
						<li><a href="index.php?c=Usuarios&p=login">Login Usuario</a></li>
						<?php }?>
					</ul>
				</nav>
				
				<div class="col-lg-8">
					<!-- conteúdo principal do site -->
					<div>
						<?php include $view; ?>
					</div>
				</div>
				<!-- rodapé -->
				<footer class="footer text-center">
					<div class="row">
						<div class="col-lg-12">
							<p>&copy Mini Blog IFSC Garopaba</p>
						</div>
					</div>
				</footer>
			</div>
		</div><!-- div container -->
	</body>
</html>