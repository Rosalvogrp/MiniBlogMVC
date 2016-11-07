<?php
require 'lib/Db.php';
$dbh = new Db(); # faz a conexao com o SGBD
$sql = 'DELETE FROM post WHERE id = :id';
$id = filter_input(INPUT_GET, 'id'); # captura a var "id" da URL
$sth = $dbh->prepare( $sql );
$sth->bindParam(':id', $id); # substitui os rótulos pela informação 
$sth->execute();
header('Location:adm.php'); # redireciona
?>