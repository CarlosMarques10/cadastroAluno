<?php
require 'config.php';
require 'dao/UsuarioDaoAluno.php';

$usuarioDao = new UsuarioDaoAluno($pdo);
$lista = $usuarioDao->findAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link  href="assets/style.css"  rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark d-flex justify-content-center">
        <ul class="navbar-nav">
            <li><a href="cadastrarAluno.php" class="nav-item nav-link cadastro">Cadastrar Aluno</a></li>
        </ul>
    </nav>
</header>

<section>
    <div class="container">
        <a href="cadastrarNovoAluno.html" class="btn btn-primary btnCadastrarAluno">Cadastrar novo aluno</a>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered tabela">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Matricula</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista as $usuario): ?>
                    <tr>
                        <td><?=$usuario->getId(); ?></td>
                        <td><?=$usuario->getNome(); ?></td>
                        <td><?=$usuario->getEmail(); ?></td>
                        <td><?=$usuario->getMatricula(); ?></td>
                        <td>
                            <a href="editar.php?id=<?=$usuario->getId(); ?>" class="btn btn-secondary botoesAcao">Editar</a>
                            <a href="excluir.php?id=<?=$usuario->getId(); ?>" class="btn btn-danger botoesAcao" onclick="return confirm('Deseja excluir o aluno <?=$usuario->getNome(); ?>')">Excluir</a>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>

        </div>


        
    </div>
</section>

    
  
</body>
</html>