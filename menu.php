<div class="header clearfix">
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Mini Blog</a>
			</div>
		<ul class="nav navbar-nav pull-right ">
			<li role="presentation">
				<a href="adm.php">Administrador de Posts</a>
			</li>
			<?php
			if(!isset($_SESSION['usuario'])){
			?>
			<li role="presentation">
				<a href="login.php">Login</a>
			</li>
			<?php
			}else{
			?>
			<li role="presentation"><a><div class="alert-success"><?php echo 'Bem vindo '. $_SESSION['usuario'].'';?></div></a></li>
			<li role="presentation">
				<a href="logout.php">Logout</a>
			</li>
			
			<?php
			}
			?>
		</ul>
		</div>
	</nav>
</div>