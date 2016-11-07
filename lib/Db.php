<?php
	class Db extends PDO{
		
		function __construct(){
			$user = 'root';
			$pass = '';
			$database = 'miniblog';
			$dsn = "mysql:host=localhost;dbname=$database";
			// confugurar as opções
			$options = array(
				PDO::ATTR_PERSISTENT => TRUE,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			);
			
			try{
				parent::__construct($dsn, $user , $pass, $options);
			} catch(PDOException $e){
				echo '<div class="alert alert-danger">';
				echo $e->getMessage();
				echo '</div>';
			}
		}
	}
?>