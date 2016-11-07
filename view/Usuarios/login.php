<h1>Login</h1>
<?php echo $msg; ?>
<form method="post" class="well">
	<div class="form-group">
		<label>
		Login:
			<input type="text" name="login" class="form-control" required>
		</label>
	</div>
	<div class="form-group">
		<label>
		Senha:
			<input type="password" name="senha" class="form-control" required>
		</label>
	</div>
	<input type="submit" value="Entrar" class="btn btn-primary">
</form>