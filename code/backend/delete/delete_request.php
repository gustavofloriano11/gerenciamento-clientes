<?php

    include "../database/db.php";

    $id = $_GET['id'];

    $query = "DELETE
    FROM solicitacao
    WHERE id_solicitacao = $id";

    $result = $conn->query($query);

    if($result === true){
        echo "Solicitação deletada com sucesso! 😙"; ?>
        <a href="../../frontend/index.html"><button>Voltar</button></a>
        <?php       
    } else {
        echo "ERRO 😯";
    }