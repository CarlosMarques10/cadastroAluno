<?php
require 'config.php';
require 'dao/UsuarioDaoAluno.php';

$usuarioDao = new UsuarioDaoAluno($pdo);

$usuario = false;
$id = filter_input(INPUT_GET,'id');

if($id){
    $usuario = $usuarioDao->findById($id);
}
if($usuario === false){
    header("Location: cadastrarAluno.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link  href="assets/style.css"  rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<section>
        <div class="divNovoAluno">
            <h2>UCSAL <small class="text-muted">Editar aluno</small></h2> 
            
            <form method="post" action="editarAluno.php">
                <input type="hidden" name="id" value="<?=$usuario->getId(); ?>">
                <div class="form-group">
                        <input type="text" name="nome" class="form-control input" placeholder="Digite o nome" required maxlength="40" value="<?=$usuario->getNome(); ?>">   
                </div>
                <div class="form-group">
                        <input type="email" name="email" class="form-control input" placeholder="Digite o email" required maxlength="40" value="<?=$usuario->getEmail(); ?>"> 
                </div>
                <div class="form-group"> 
                    <input type="text" name="matricula" class="form-control input" placeholder="Digite a matricula" required maxlength="9" value="<?=$usuario->getMatricula(); ?>"> 
                </div>
                <div class="form-group"> 
                    <input type="submit" value="Enviar" class="form-control input btn btn-success"> 
                </div>
            </form>
        </div>


    </section>
    
</body>
</html>