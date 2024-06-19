<?php
    include '../dao/connectionFactory.php'; 
    include '../dao/ClienteDao.php'; 
    include '../model/Cliente.php'; 

    $cli = new Cliente();
    $clienteDao = new ClienteDao();

    //Pegar os dados enviados
    $dadosRequest = filter_input_array(INPUT_POST);

    //se a operacao for salvar
    if(isset($_POST['cadastrar'])){
        $cli->setNome($_POST['nome']);
        $cli->setSobrenome($_POST['sobrenome']);
        $cli->setDatanascimento($_POST['datanascimento']);
        $cli->setCpf($_POST['cpf']);
        $cli->setRg($_POST['rg']); 
        $clienteDao->inserir($cli);
        header("location: ../view/cliente.php");
    }elseif(isset($_GET['del'])){
        $cliente->setId($_GET['del']);
        $clienteDao->delete($cliente);
        header("location: ../view/cliente.php");
    }
    

?>