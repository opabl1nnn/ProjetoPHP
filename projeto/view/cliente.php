
<?php
    include '../dao/ConnectionFactory.php';
    include '../dao/ClienteDao.php';
    include '../model/Cliente.php';   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
<body class="bg-dark-subtle">
    <div class="container-fluid">
        <div class="row"></div>
            <?php
                include 'listamenu.php';
            ?>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 text-center mt-5 p-3">
            
                <form action="../controller/ClienteController.php" method="post">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" name="nome" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="sobrenome" class="form-label">Sobrenome:</label>
                        <input type="text" name="sobrenome" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="datanascimento" class="form-label">Data de Nascimento:</label>
                        <input type="date" name="datanascimento" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF:</label>
                        <input type="number" name="cpf" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for=" rg">RG:</label>
                        <input type="number" name="rg" class="form-control">
                    </div>
                    <input type="submit" name="cadastrar" value="Salvar" class="btn btn-dark">
                </form>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">CPF</th>
                        <th scope="col">RG</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $clienteDao = new ClienteDao();
                        foreach($clienteDao->read() as $cli) : 
                    ?>
                    <tr>
                        <td><?= $cli->getId()?></td>
                        <td><?= $cli->getNome()?></td>
                        <td><?= $cli->getSobrenome()?></td>
                        <td><?= $cli->getDatanascimento()?></td>
                        <td><?= $cli->getCpf()?></td>
                        <td><?= $cli->getRg()?></td>
                        <td>
                            <a href="../controller/ClienteController.php?del=<?= $cli->getId() ?>"><button class="btn btn-dark btn-sm" name="del" type="button">Excluir</button></a>
                              
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="col-2"></div>
        </div>
    </div>
</body>
</html>