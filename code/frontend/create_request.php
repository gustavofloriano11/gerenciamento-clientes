<?php

    include '../backend/database/db.php';

    $query_cliente = "SELECT * FROM cliente";
    $query_colaborador = "SELECT * FROM funcionario";

    $result_cliente = $conn->query($query_cliente);
    $result_colaborador = $conn->query($query_colaborador);
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
                <option value="null">Selecione uma Opção</option>
                <?php if($result_cliente -> num_rows > 0) {
                    while($row_cliente = $result_cliente->fetch_assoc()) { ?>
                        <option value="<?php echo $row_cliente['id'] ?>"><?php echo $row_cliente['nome_cliente']; ?></option>
<?php               } 
                }?>
            </select>
            <label for="funcionario">Colaborador:</label>
            <select name="funcionario">
                <option value="null">Selecione uma Opção</option>
                <?php if($result_colaborador -> num_rows > 0) {
                    while($row_colaborador = $result_colaborador->fetch_assoc()) { ?>
                        <option value="<?php echo $row_colaborador['id'] ?>"><?php echo $row_colaborador['nome_funcionario']; ?></option>
<?php               } 
                }?>
            </select>
            <label for="urgencia">Urgência:</label>
            <select name="urgencia">
                <option value="null">Selecione uma Opção</option>
                <option value="baixa">Baixa</option>
                <option value="media">Média</option>
                <option value="alta">Alta</option>
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