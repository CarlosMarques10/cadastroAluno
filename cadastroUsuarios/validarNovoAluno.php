<?php
require 'config.php';
require 'dao/UsuarioDaoAluno.php';

$usuarioDao = new UsuarioDaoAluno($pdo);

$nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$matricula = filter_input(INPUT_POST,'matricula');

if($nome && $email && $matricula){
    
    if($usuarioDao->findByEmail($email) === false){
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($nome);
        $novoUsuario->setEmail($email);
        $novoUsuario->setMatricula($matricula);

        $usuarioDao->add($novoUsuario);

        header("Location: cadastrarAluno.php");
        exit;
    }else{
        header("Location: cadastrarNovoAluno.html");
        exit;
    }

}else{
    header("Location: cadastrarNovoAluno.html");
    exit;
}