<?php

class UsuariosController{
    public function login(){
        #$Usuarios = Usuarios::getAll();
		$login = filter_input(INPUT_POST, "login");
		$senha = filter_input(INPUT_POST, "senha");
		$msg = '';
		if($login){
			$salt = 'SADSdDA$$$&¨%#&¨%#&%&#¨#¨&@';
			$senha = $salt.$senha; # coloca um tempero na senha
			$senha = md5($senha); # criptografa
			$u = new Usuarios();
			$u->login($login, $senha);
			if($u->id){
				#encontrou
				session_start();
				$_SESSION['usuario'] = $u->id;
				header('Location:index.php');
			}
			else{
				#nao encontrou
				$msg = '<div class="alert alert-danger">Dados não conferem</div>';
			}
		}
        $view = 'view/Usuarios/login.php';
        include 'template/template1.php';
    }
	
	public function cadastrar(){
		$nome = filter_input(INPUT_POST, "nome");
		$login = filter_input(INPUT_POST, "login");
		$senha = filter_input(INPUT_POST, "senha");
		$senha2 = filter_input(INPUT_POST, "senha2");
		$msg = ''; #var que armazena o status da operação 
		if($login){
			if($senha != $senha2){
				$msg = '<div class="alert alert alert-danger">Senhas não conferem</div>';
			}else{
				$u = new Usuarios();
				$u->nome = strip_tags($nome);
				$u->login = strip_tags($login);
				$salt = 'SADSdDA$$$&¨%#&¨%#&%&#¨#¨&@';
				$senha = $salt.$senha; # coloca um tempero na senha
				$senha = md5($senha); # criptografa
				$u->senha = strip_tags($senha);
				$u->save();
				if($row){
					$msg = '<div class="alert alert-success">Usuario Criado com Sucesso</div>';
				}
				else{
					$msg = '<div class="alert alert-danger">Puts ERRO!</div>';
				}
				header("Location: index.php?c=Post&p=principal");
				
				
			}
		}
		$view = 'view/Usuarios/cadastrar.php';
        include 'template/template1.php';
	}
	
	public function logout(){
		session_start();
		session_destroy();
	
		header('location: index.php?c=Usuarios&p=login');
	}
} # fim da classe
?>