<?php

    include '../backend/database/db.php';

    $id = $_GET['id'];

    $query_cliente = "SELECT *
    FROM solicitacao
    INNER JOIN cliente
    ON id_cliente = cliente.id
    WHERE id_solicitacao = $id";

    $query = "SELECT * 
    FROM solicitacao
    INNER JOIN funcionario
    ON id_funcionario = funcionario.id";

    $result_cliente = $conn->query($query_cliente);
    $result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="../backend/create/create_request.php">
        <div>
            <label for="problema">Problema:</label>
            <textarea name="problema"></textarea>
            <label for="cliente">Cliente:</label>
            <select name="cliente">
                <?php if($result_cliente -> num_rows > 0) {
                    while($row = $result_cliente->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id_cliente']; ?>"><?php echo $row['nome_cliente'];?></option>
<?php               } 
                }?>
            </select>
            <label for="funcionario">Colaborador:</label>
            <select name="funcionario">
                <option value="null">Selecione uma Opção</option>
                <?php if($result -> num_rows > 0) {
                    while($row = $result->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id_funcionario'] ?>"><?php echo $row['nome_funcionario'];?></option>
<?php               }
                }?>
            </select>
            <label for="urgencia">Urgência:</label>
            <select name="urgencia">
                <?php if($result -> num_rows > 0){}?>
            </select>
            <label for="status">Status:</label>
            <select name="status">
                <option value="pendente">Pendente</option>
                <option value="andamento">Em Andamento</option>
                <option value="finalizada">Finalizado</option>
            </select>
            <label for="data">Data de Abertura:</label>
            <input type="date" name="data">
        </div>
        <button>Enviar</button>
    </form>
</body>
</html>