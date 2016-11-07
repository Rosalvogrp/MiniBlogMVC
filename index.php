<?php
# arquivo /index.php

session_start();

require 'lib/Db.php';
require 'model/Post.php';
require 'model/Comentarios.php';
require 'model/Usuarios.php';

# qual controller instanciar
$controller = filter_input(INPUT_GET,'c');
# qual método do controller executar
$metodo = filter_input(INPUT_GET, 'p');

if(!$controller){
	# página inicial do site	
	require 'controller/PostController.php';
	$dc = new PostController();
	$dc->principal();
}
else{
	$controller .= 'Controller';
	require 'controller/'.$controller.'.php';
	$dc = new $controller;
	$dc->$metodo();
}