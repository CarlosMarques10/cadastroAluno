<?php

require 'config.php';
require 'dao/UsuarioDaoAluno.php';

$usuarioDao = new UsuarioDaoAluno($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id){
    $usuarioDao->delete($id);
}

header("Location: cadastrarAluno.php");
exit;