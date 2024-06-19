<?php
    include '../dao/ConnectionFactory.php';
    include '../dao/PublicacaoDao.php';
    include '../model/Publicacao.php';
    include '../dao/ClienteDao.php';
    include_once '../model/Cliente.php';
    include '../dao/CarroDao.php'; 
    include_once '../model/Carro.php';    

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
    <?php
    include 'listamenu.php';
    ?>
            <div class="row">
            <div class="col-2"></div>
            <div class="col-8 mt-5 p-3 text-center">
                <form action="../controller/PublicacaoController.php" method="post">
                    <div class="mb-3">
                        <label for="cliente" class="form-label">ID CLIENTE</label>
                        <input type="number" name="cliente" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="carro" class="form-label">ID CARRO</label>
                        <input type="number" name="carro" class="form-control">
                    </div>
                    <input type="submit" name="cadastrar" value="Salvar" class="btn btn-dark">
                </form>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row">
        <div class="col-12">
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Fabricante</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Quilometragem</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                        $carroDao = new CarroDao();                
                       foreach($carroDao->read() as $carro) :
                    ?>
                    <tr>
                        <td><?= $carro->getId()?></td>
                        <td><?= $carro->getModelo()?></td>
                        <td><?= $carro->getCategoria()?></td>
                        <td><?= $carro->getFabricante()?></td>
                        <td><?= $carro->getAno()?></td>
                        <td><?= $carro->getQuilometragem()?></td>
                        <td>
                            <a href="../controller/CarroController.php?del=<?= $carro->getId() ?>"></a>
                              
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Veiculo</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $publicacaoDao = new PublicacaoDao();
                        foreach($publicacaoDao->read() as $pub) : 
                    ?>
                    <tr>
                        <td><?= $pub->getId()?></td>
                        <td><?= $pub->getNomecliente()?></td>
                        <td><?= $pub->getModelocarro()?></td>
                        <td>
                            <a href="../controller/PublicacaoController.php?del=<?= $pub->getId() ?>"></a>
                              
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="col-12">
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
                            <a href="../controller/ClienteController.php?del=<?= $cli->getId() ?>"></a>
                              
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        </div>
</body>
</html>