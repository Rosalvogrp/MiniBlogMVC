<?php
class Post{
    public $id;
    public $titulo;
	public $conteudo;
	public $autor;
	public $data;

    function __construct($id = null){
        if( !empty($id) ){
            $db = new Db();
            $rs = $db->prepare('SELECT * FROM post WHERE id = :id');
            $rs->bindParam(':id', $id);
            $rs->execute();
            $row = $rs->fetch(PDO::FETCH_OBJ);
            if($row) {
                $this->id = $row->id;
                $this->titulo = $row->titulo;
				$this->conteudo = $row->conteudo;
                $this->autor = $row->autor;
				$this->data = $row->data;
            }
        }
    }

    /* salva as informações do objeto no banco*/
    public function save(){
        $db = new Db();
        if($this->id){ #UPDATE
            $sql = 'UPDATE post SET titulo = :titulo, conteudo = :conteudo, autor = :autor, data = :data WHERE id = :id';
            $sth = $db->prepare( $sql );
            $sth->bindParam(':titulo', $this->titulo);
			$sth->bindParam(':conteudo', $this->conteudo);
			$sth->bindParam(':autor', $this->autor);
			$sth->bindParam(':data', $this->data);
            $sth->bindParam(':id', $this->id);
            return $sth->execute();
        }
        else { #INSERT
            $sql = 'INSERT INTO post (titulo, conteudo, autor, data) VALUES (:titulo, :conteudo, :autor, :data)';
            $sth = $db->prepare($sql);
            $sth->bindParam(':titulo', $this->titulo);
			$sth->bindParam(':conteudo', $this->conteudo);
			$sth->bindParam(':autor', $this->autor);
			$sth->bindParam(':data', $this->data);
            return $sth->execute();
        }
    }

    /* apaga a linha do BD*/
    public function delete(){
        $db = new Db();
        $sql = 'DELETE FROM post WHERE id = :id';
        $sth = $db->prepare($sql);
        $sth->bindParam(':id', $this->id);
        return $sth->execute();
    }
	
    /* Método que retorna uma coleção de Posts*/
    public static function getAll(){
        $db = new Db();
        $sql = 'select * from post';
        $rs = $db->query($sql);
        $post = $rs->fetchAll(PDO::FETCH_CLASS, 'Post');
        return $post;
    }
	
	/* Método que retorna uma coleção de Comentarios*/
    public function getComentarios(){
        $db = new Db();
        $sql = 'select * from comentarios where idpost='.$this->id;
        $rs = $db->query($sql);
        $comentarios = $rs->fetchAll(PDO::FETCH_CLASS, 'comentarios');
        return $comentarios;
    }

}# fim da classe
?>