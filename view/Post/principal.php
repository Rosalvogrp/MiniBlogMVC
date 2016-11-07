<?php
# arquivo view/Post/listar.php
# controller irá fornecer a var $Post
echo '<form class="form well"';
echo '<div class="form-group">';
echo '<table class="table table-striped">';
foreach($Posts as $d){
	echo "<h2><a href='index.php?c=Post&p=exibir&id=" .$d->id. "'>" .wordwrap(nl2br ($d->titulo), 75, "\n", true). "</a></h2>";
	echo '<p class="lead">Feito Por <a href="#">' .wordwrap(nl2br ($d->autor), 75, "\n", true). '</a></p>';
	echo '<hr><p><span class="glyphicon glyphicon-time">' .wordwrap(nl2br ($d->data), 75, "\n", true). '</span></p><hr>';
	echo '<p>'.wordwrap(nl2br ($d->conteudo), 75, "\n", true).'</p>';
	echo '<hr>';
	echo '<a type="submit" class="btn btn-primary" value="Comentar" href="index.php?c=Post&p=exibir&id=' .$d->id. '">Comentar</a>';
	echo '<hr>';
}
echo '</table>';
echo '</div>';
echo '</form>';
?>
<hr>