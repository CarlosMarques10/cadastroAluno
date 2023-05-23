<?php

class Pessoa{
    protected $id;
    protected $nome;
    protected $email;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = trim($id);
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = ucwords(trim($nome));
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = strtolower(trim($email));
        return $this;
    }
}


class Usuario extends Pessoa{

    private $matricula;
 
    public function getMatricula()
    {
        return $this->matricula;
    }

    public function setMatricula($matricula)
    {
        $this->matricula = trim($matricula);
        return $this;
    }
}



interface UsuarioDao{
    public function add(Usuario $u);
    public function findAll();
    public function findByEmail($email);
    public function findById($id);
    public function update(Usuario $u);
    public function delete($id);

}
