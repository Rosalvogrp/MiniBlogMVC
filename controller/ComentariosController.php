<?php
class ComentariosController{
	
    public function cadastrar(){
		$idpost= filter_input(INPUT_GET, 'id');
		$post = Post::getAll();
		$autor = filter_input(INPUT_POST, 'autor');
		$coment = filter_input(INPUT_POST, 'comentarios');
		# verifica se o form foi submetido
		if($coment){
			$co = new Comentarios();
			$co->autor = $autor;
			$co->coment = $coment;
			$co->idpost = $idpost;
			$co->save();
			header('Location:index.php?c=Post&p=exibir&id='.$idpost);
		}
		
		$view = 'view/Comentarios/cadastrar.php';
        include 'template/template1.php';
		
    }
	
	public function exibir(){
		$comentarios = Comentarios::getAll();
		$view = 'view/Comentarios/exibir.php';
		require 'template/template1.php';
	}
}
?>