<?php

    include "../backend/database/db.php";

    $query_solicitacao = "SELECT * FROM solicitacao INNER JOIN cliente
    ON id_cliente = cliente.id
    INNER JOIN funcionario
    ON id_funcionario = funcionario.id";

    $result_solicitacao = $conn->query($query_solicitacao)



?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Solicitações</title>
</head>
<body>
    <h3>Solicitações Abertas:</h3>
    <table border="1">
        <?php
        if($result_solicitacao -> num_rows > 0){ ?>
            <tr>
                <th>Nome do Cliente:</th>
                <th>Nome do Funcionário:</th>
                <th>Problema:</th>
                <th>Status:</th>
                <th>Urgência:</th>
                <th>Data de Abertura:</th>
            </tr>
        <?php 
            while($row_solicitacao = $result_solicitacao->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row_solicitacao['nome_cliente']?></td>
                    <td><?php echo $row_solicitacao['nome_funcionario']?></td>
                    <td><?php echo $row_solicitacao['descricao']?></td>
                    <td><?php echo $row_solicitacao['status_solicitacao']?></td>
                    <td><?php echo $row_solicitacao['urgencia']?></td>
                    <td><?php echo $row_solicitacao['data_abertura']?></td>
                </tr>
                <?php
            }
        }
        
        ?>
    </table>
</body>
</html>