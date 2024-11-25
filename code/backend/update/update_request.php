<?php

    include "../database/db.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $id = $_GET['id'];

        $id_funcionario = $_POST['funcionario'];
        $urgencia = $_POST['urgencia'];
        $status = $_POST['status'];

        $query = "UPDATE solicitacao
        SET id_funcionario = $id_funcionario,
        urgencia = '$urgencia',
        status_solicitacao = '$status'
        WHERE id_solicitacao = $id";

        $result = $conn->query($query);

        if($result === true){
            echo "Solicitação atualizada com sucesso! 😙"; ?>
            <a href="../../frontend/index.html"><button>Voltar</button></a>
            <?php       
        } else {
            echo "Dados inválidos! 😯";
        }
    }

