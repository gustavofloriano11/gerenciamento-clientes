<?php

    include "../database/db.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id_cliente = $_POST['cliente'];
        $id_colaborador = $_POST['funcionario'];
        $problema = $_POST['problema'];
        $urgencia = $_POST['urgencia'];
        $status = $_POST['status'];
        $data = $_POST['data'];
        
        $query = "INSERT INTO solicitacao (id_cliente, id_funcionario, urgencia, descricao, status_solicitacao, data_abertura)
        VALUES ('$id_cliente', '$id_colaborador', '$urgencia', '$problema', '$status', '$data')";

        $result = $conn->query($query);

        if($result === true){
            echo "Solicitação registrada com sucesso! 😙"; ?>
            <a href="../../frontend/index.html"><button>Voltar</button></a>
            <?php       
        } else {
            echo "Dados inválidos! 😯";
        }
    }