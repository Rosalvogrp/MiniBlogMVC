<div class="fixed">
<table class="table table-striped">
	<tr>
		<!--<th>Id</th>-->
		<th>Id</th>
		<th>Titulo</th>
		<th>Autor</th>
		<th>Conteúdo</th>
		<th>Data</th>
		<th>Editar</th>
		<th>Apagar</th>
	</tr>

<?php
# arquivo view/Post/listar.php
# controller irá fornecer a var $Post
	
foreach($Posts as $d){
    echo '<tr>';
    echo '<td>'.wordwrap(nl2br ($d->id), 2, "\n", true).'</td>';
    echo '<td>'.wordwrap(nl2br ($d->titulo), 15, "\n", true).'</td>';
	echo '<td>'.wordwrap(nl2br ($d->autor), 15, "\n", true).'</td>';
	echo '<td>'.wordwrap(nl2br ($d->conteudo), 70, "\n", true).'</td>';
	echo '<td>'.$d->data.'</td>';
	# coluna de editar
	echo '<td>';
	echo '<a href="index.php?c=Post&p=editar&id='.$d->id.'" class="text-warning">';
	echo '[editar]';
	echo '</a>';
	echo '</td>';
	# coluna de apagar
	echo '<td>';
	echo '<a href="index.php?c=Post&p=apagar&id='.$d->id.'" class="text-danger">';
	echo '[apagar]';
	echo '</a>';
	echo '</td>';
	
    echo '<tr>';
}
echo '</table>';
?>
<hr>
</div>