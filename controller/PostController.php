<?php
# arquivo /controller/PostController.php
# cada método desta classe, é uma pagina do site
# referente ao módulo Post

class PostController{
    public function listar(){
		if(!isset($_SESSION['usuario'])){
			header('Location:index.php?c=Post&p=Principal');
		}
        $Posts = Post::getAll();
        $view = 'view/Post/listar.php';
        include 'template/template1.php';
    }
	
	public function principal(){
        $Posts = Post::getAll();
        $view = 'view/Post/principal.php';
        include 'template/template1.php';
    }
	
    public function cadastrar(){
		if(!isset($_SESSION['usuario'])){
			header('Location:index.php?c=Post&p=Principal');
		}
		$titulo = filter_input(INPUT_POST, 'titulo');
		$autor = filter_input(INPUT_POST, 'autor');
		$conteudo = filter_input(INPUT_POST, 'conteudo');
		$data = filter_input(INPUT_POST, 'data');
		if($titulo){
			# quer dizer que o formulario foi enviado
			$d = new Post();
			$d->titulo = strip_tags($titulo);
			$d->autor = strip_tags($autor);
			$d->conteudo = strip_tags($conteudo);
			$d->data = strip_tags($data);
			$d->save();
			header("Location: index.php?c=Post&p=listar");
		}
		$view = 'view/Post/cadastrar.php';
        include 'template/template1.php';
    }

    public function editar(){
		if(!isset($_SESSION['usuario'])){
			header('Location:index.php?c=Post&p=Principal');
		}
		//$Posts = Post::save();
		$id = filter_input(INPUT_GET, 'id');
		$d = new Post($id);
		$titulo = filter_input(INPUT_POST, 'titulo');
		$autor = filter_input(INPUT_POST, 'autor');
		$conteudo = filter_input(INPUT_POST, 'conteudo');
		$data = filter_input(INPUT_POST, 'data');
		if($titulo){
			# quer dizer que o formulario foi enviado
			$d = new Post();
			$d->id = $id;
			$d->titulo = $titulo;
			$d->autor = $autor;
			$d->conteudo = $conteudo;
			$d->data = $data;
			$d->save();
			header("Location: index.php?c=Post&p=listar");
		}
		$view = 'view/Post/editar.php';
        include 'template/template1.php';
    }

    public function apagar(){
		if(!isset($_SESSION['usuario'])){
			header('Location:index.php?c=Post&p=Principal');
		}
		$id = filter_input(INPUT_GET, 'id'); # captura a var "id" da URL
		$d = new Post($id);
		$c = new Comentarios();
		$c->delete();
		$d->delete();
		header("Location: index.php?c=Post&p=listar");
    }
	
	 public function exibir(){
		$id = filter_input(INPUT_GET, 'id');
		$d = new Post($id);
		$comentarios = $d->getComentarios();
		$titulo = filter_input(INPUT_POST, 'titulo');
		$autor = filter_input(INPUT_POST, 'autor');
		$conteudo = filter_input(INPUT_POST, 'conteudo');
		$data = filter_input(INPUT_POST, 'data');
		$view = 'view/Post/exibir.php';
        include 'template/template1.php';
    }
} # fim da classe
?>