<?php
# arquivo /view/Comentários/cadastrar.php
?>
<form class="form well" method="post" action="index.php?c=Comentarios&p=cadastrar&id=<?php echo $d->id?>">
		<div class="form-group">
			<h4>Comentar:</h4>
			<label for="autor">Autor: </label>
			<input class="form-control" type="text" name="autor" id="autor" placeholder="Exemplo: Rosalvo Da Silva Marcelino"required>
			
			<label for="comentarios"></label>
			<textarea class="form-control" rows="10" cols="10" name="comentarios" id="comentarios" placeholder="Exemplo: Muito Loca essa postagem hahahaha"required></textarea>
		</div>
	<input type="submit" class="btn btn-primary" value="Enviar">
</form>