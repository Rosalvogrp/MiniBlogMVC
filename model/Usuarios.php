<?php
class Usuarios{
    public $id;
    public $nome;
	public $login;
	public $senha;

    function __construct($id = null){
        if( !empty($id) ){
            $db = new Db();
            $rs = $db->prepare('SELECT * FROM usuarios WHERE id = :id');
            $rs->bindParam(':id', $id);
            $rs->execute();
            $row = $rs->fetch(PDO::FETCH_OBJ);
            if($row) {
                $this->id = $row->id;
                $this->nome = $row->nome;
				$this->login = $row->login;
                $this->senha = $row->senha;
            }
        }
    }
	
	 function login($login, $senha){
            $db = new Db();
            $rs = $db->prepare('SELECT * FROM usuarios WHERE login = :login AND senha =:senha');
            $rs->bindParam(':login', $login);
			$rs->bindParam(':senha', $senha);
            $rs->execute();
            $row = $rs->fetch(PDO::FETCH_OBJ);
            if($row) {
                $this->id = $row->id;
                $this->nome = $row->nome;
				$this->login = $row->login;
                $this->senha = $row->senha;
            }
    }


    /* salva as informções do objeto no banco*/
    public function save(){
        $db = new Db();
        if( $this->id){ #UPDATE
            $sql = 'UPDATE usuarios SET nome = :nome, login = :login, senha = :senha WHERE id = :id';
            $sth = $db->prepare( $sql );
            $sth->bindParam(':nome', $this->nome);
			$sth->bindParam(':login', $this->login);
			$sth->bindParam(':senha', $this->senha);
            $sth->bindParam(':id', $this->id);
            return $sth->execute();
        }
        else { #INSERT
            $sql = 'INSERT INTO usuarios (nome, login, senha) VALUES (:nome, :login, :senha)';
            $sth = $db->prepare($sql);
            $sth->bindParam(':nome', $this->nome);
			$sth->bindParam(':login', $this->login);
			$sth->bindParam(':senha', $this->senha);
            return $sth->execute();
        }
    }

    /* apaga a linha do BD*/
    public function delete(){
        $db = new Db();
        $sql = 'DELETE FROM usuarios WHERE id = :id';
        $sth = $db->prepare($sql);
        $sth->bindParam(':id', $this->id);
        return $sth->execute();
    }

    /* Método que retorna uma coleção de usuarios*/
    public static function getAll(){
        $db = new Db();
        $sql = 'select * from usuarios';
        $rs = $db->query($sql);
        $usuarios = $rs->fetchAll(PDO::FETCH_CLASS, 'usuarios');
        return $usuarios;
    }

}# fim da classe
?>