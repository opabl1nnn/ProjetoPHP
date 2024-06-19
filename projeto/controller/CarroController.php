<?php
    include '../dao/connectionFactory.php'; 
    include '../dao/CarroDao.php'; 
    include '../model/Carro.php'; 

    $carro = new Carro();
    $carroDao = new CarroDao();

    //Pegar os dados enviados
    $dadosRequest = filter_input_array(INPUT_POST);

    //se a operacao for salvar
    if(isset($_POST['cadastrarCarro'])){
        $carro->setModelo($_POST['modelo']);
        $carro->setCategoria($_POST['categoria']);
        $carro->setFabricante($_POST['fabricante']);
        $carro->setQuilometragem($_POST['quilometragem']);
        $carro->setAno($_POST['ano']);
        $carroDao->inserir($carro);
        header("location: ../view/carro.php");
    }elseif(isset($_GET['del'])){
        $carro->setId($_GET['del']);
        $carroDao->delete($carro);
        header("location: ../view/carro.php");
    }


?>