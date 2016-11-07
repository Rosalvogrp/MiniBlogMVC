<?php
# arquivo /view/Post/cadastrar.php
?>
<h1>Cadastro de Post</h1>
<form class="form well" method="post">
	<div class="form-group">
		<label for="titulo">Titulo: </label>
		<input class="form-control" type="text" name="titulo" id="titulo" placeholder="Exemplo: titulo1" required>
		
		<label for="autor">Autor: </label>
		<input class="form-control" type="text" name="autor" id="autor" placeholder="Exemplo: Rosalvo Da Silva Marcelino"required>
		
		<label for="conteudo">Conteúdo: </label>
		<textarea class="form-control" rows="10" cols="10" name="conteudo" id="conteudo" placeholder="Exemplo: Conteúdo da sua postagem"required></textarea>
		
		<label for="data">Data: </label>
		<input class="form-control" type="datetime-local" name="data" id="data" required>
		
	</div>
	<input type="submit" class="btn btn-primary" value="salvar">
</form>