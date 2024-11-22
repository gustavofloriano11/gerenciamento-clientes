<?php

    include "../backend/database/db.php";

    $query = "SELECT * FROM solicitacao INNER JOIN cliente
    ON id_cliente = cliente.id
    INNER JOIN funcionario
    ON id_funcionario = funcionario.id";

    $result = $conn->query($query)



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
        if($result -> num_rows > 0){ ?>
            <tr>
                <th>Nome do Cliente:</th>
                <th>Nome do Funcionário:</th>
                <th>Problema:</th>
                <th>Status:</th>
                <th>Urgência:</th>
                <th>Data de Abertura:</th>
                <th>Ações:</th>
            </tr>
        <?php 
            while($row = $result->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row['nome_cliente']?></td>
                    <td><?php echo $row['nome_funcionario']?></td>
                    <td><?php echo $row['descricao']?></td>
                    <td><?php echo $row['status_solicitacao']?></td>
                    <td><?php echo $row['urgencia']?></td>
                    <td><?php echo $row['data_abertura']?></td>
                    <td><a href="update_request.php?id=<?php echo $row['id']?>">Editar</a> | <a href="delete_request.php">Excluir</a></td>
                </tr>
                <?php
            }
        }
        
        ?>
    </table>
</body>
</html>