<?php
class Comentarios{
    public $id;
	public $autor;
    public $coment;
    public $idpost;

    function __construct($id = null){
        if( !empty($id) ){
            $db = new Db();
            $rs = $db->prepare('SELECT * FROM comentarios WHERE id = :id');
            $rs->bindParam(':id', $id);
            $rs->execute();
            $row = $rs->fetch(PDO::FETCH_OBJ);
            if($row) {
                $this->id = $row->id;
				$this->autor = $row->autor;
                $this->coment = $row->coment;
                $this->idpost = $row->idpost;
            }
        }
    }

    /* salva as informções do objeto no banco*/
    public function save(){
        $db = new Db();
        if( $this->id){ #UPDATE
            $sql = 'UPDATE comentarios SET autor = :autor, coment = :coment, idpost = :idpost WHERE id = :id';
            $sth = $db->prepare( $sql );
			$sth->bindParam(':autor', $this->autor);
            $sth->bindParam(':coment', $this->coment);
			$sth->bindParam(':idpost', $this->idpost);
            $sth->bindParam(':id', $this->id);
            return $sth->execute();
        }
        else { #INSERT
            $sql = 'INSERT INTO comentarios (autor, coment, idpost) VALUES (:autor, :coment, :idpost)';
            $sth = $db->prepare($sql);
			$sth->bindParam(':autor', $this->autor);
            $sth->bindParam(':coment', $this->coment);
            $sth->bindParam(':idpost', $this->idpost);
            return $sth->execute();
        }
    }

    /* apaga a linha do BD*/
    public function delete(){
        $db = new Db();
        $sql = 'DELETE FROM comentarios WHERE id = :id';
        $sth = $db->prepare($sql);
        $sth->bindParam(':id', $this->id);
        return $sth->execute();
    }
	
	/* comentarios pertence a um post*/
    public function getPost(){
        $post = new Post($this->id);
        return $post;
    }
	
    /* Método que retorna uma coleção de Comentarios*/
    public static function getAll(){
        $db = new Db();
        $sql = 'select * from comentarios';
        $rs = $db->query($sql);
        $comentarios = $rs->fetchAll(PDO::FETCH_CLASS, 'comentarios');
        return $comentarios;
    }

}# fim da classe
?>