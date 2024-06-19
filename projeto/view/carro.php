
<?php
include '../dao/ConnectionFactory.php';
include '../dao/CarroDao.php';
include '../model/Carro.php';
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Concessionaria Projeto</title>
</head>
<body class="bg-dark-subtle">
<div class="container-fluid">
    <?php
    include 'listamenu.php';
    ?>
    <div class="row">
    <div class="col-2"></div>
        <div class="col-8 mt-5 p-3 text-center">
        <form action="../controller/CarroController.php" method="post">
            <div class="mb-3 p-3">
                <label class="form-label" for="modelo">Modelo do Veiculo:</label>
                <input class="form-control" type="text" name="modelo" required>
            </div>
            <div class="mb-3 p-3">
            <label for="categoria" class="form-label">Qual a categoria do Veiculo:</label>
            <select id="categoria" name="categoria" class="form-select">
            <option value="picape">Picape</option>
            <option value="suv">SUV</option>
            <option value="esportivo">Esportivo</option>
            <option value="sedan">Sedan</option>
            <option value="motocicleta">Motocicleta</option>
            <option value="coupe">Coupe</option>
            <option value="luxo">Luxo</option>
        </select>
            </div class="mb-3 p-3">
            <div>
                <label for="fabricante" class="form-label">Fabricante do Veiculo:</label>
                <select name="fabricante" id="fabricante" class="form-select">
                    <option value="ford">FORD</option>
                    <option value="chevrolet">CHEVROLET</option>
                    <option value="dodge">DODGE</option>
                    <option value="fiat">FIAT</option>
                    <option value="volvo">VOLVO</option>
                    <option value="porsche">PORSCHE</option>
                    <option value="bmw">BMW</option>
                </select>
            </div>
            <div class="mb-3 p-3">
                <label for="ano" class="form-label">Ano do Veiculo:</label>
                <select name="ano" id="ano" class="form-select">
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                </select>
            </div>
            <div class="mb-3 p-3">
                <label for="quilometragem" class="form-label">Quilometragem do Veiculo:</label>
                <input class="form-control" type="number">
            </div>
            <div class="mb-3 p-3">
                <label class="form-label" for="descricao">Descrição do Veiculo:</label>
                <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control" placeholder="Digite aqui a descrição do seu Veiculo:"></textarea>
            </div>
            <div class="col-md-8 mb-3 d-grid gap-2 d-md-flex justify-content-md-end ">
                <a href="view/carro.php">
                    <button class="btn btn-dark" name="cadastrarCarro" type="submit">
                         Salvar
                    </button>
                </a>
            </div>
        </form>
        </div>
        <div class="col-2"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
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
                        <td><a href="../controller/CarroController.php?del=<?= $carro->getId() ?>"><button class="btn btn-dark btn-sm" name="del" type="button">Excluir</button></a></td>
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