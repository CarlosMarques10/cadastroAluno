<?php

require 'config.php';
require 'dao/UsuarioDaoAluno.php';

$usuarioDao = new UsuarioDaoAluno($pdo);

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$matricula = filter_input(INPUT_POST, 'matricula');

if($id && $nome && $email && $matricula){

    $usuario = new Usuario();
    $usuario->setId($id);
    $usuario->setNome($nome);
    $usuario->setEmail($email);
    $usuario->setMatricula($matricula);

    $usuarioDao->update($usuario);

    header("Location: cadastrarAluno.php");
    exit;
}else{
    header("Location: editar.php?id=".$id);
}