<?php
    include '../dao/connectionFactory.php';
    include '../dao/PublicacaoDao.php'; 
    include '../model/Publicacao.php'; 
    require_once '../model/Cliente.php';
    require_once '../model/Carro.php';
    require_once '../model/Publicacao.php';

    $publicacao = new Publicacao();
    $publicacaoDao = new PublicacaoDao();

    
    $dadosRequest = filter_input_array(INPUT_POST);

    
    if(isset($_POST['cadastrar'])){
        $publicacao->setClienteId($_POST['cliente']);
        $publicacao->setCarroId($_POST['carro']);
        $publicacaoDao->inserir($publicacao);
        header("location: ../view/publicacao.php");
    }elseif(isset($_GET['del'])){
        $publicacao->setId($_GET['del']);
        $publicacaoDao->delete($publicacao);
        header("location: ../view/publicacao.php");
    }


?>