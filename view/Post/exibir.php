<?php
# arquivo view/Post/exibir.php
# controller irá fornecer a var $Post
echo '<form class="form well">';
echo '<div class="form-group">';
echo '<table class="table table-striped">';
echo "<h2><a href='index.php?id=" .$d->id. "'>" .wordwrap(nl2br ($d->titulo), 75, "\n", true). "</a></h2>";
echo '<p class="lead">Feito Por <a href="#">' .wordwrap(nl2br ($d->autor), 75, "\n", true). '</a></p>';
echo '<hr><p><span class="glyphicon glyphicon-time">' .wordwrap(nl2br ($d->data), 75, "\n", true). '</span></p><hr>';
echo '<p>'.wordwrap(nl2br ($d->conteudo), 75, "\n", true).'</p>';
echo '<hr>';
echo '</table>';
echo '</form>';
echo '<table class="table table-striped">';
foreach($comentarios as $co){
	echo '<div class="media">';
		echo 
		'<a class="pull-left" href="#">
		<img class="media-object" src="img/user.png" alt="100%">
		</a>';
		echo '<div class="media-body">';
		echo '<h4 class="media-heading">';
		echo $co->autor;
		echo '<br/><small>';
		echo date('d/m/Y');
		//echo 'August 25, 2014 at 9:30 PM';
		echo'</small>';
		echo '</h4>';
		echo wordwrap(nl2br ($co->coment), 75, "\n", true);
		echo '</div>
	</div>';
}
echo '</table>';
include '/view/Comentarios/cadastrar.php';

?>
<hr>