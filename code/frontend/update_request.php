<?php

    include '../backend/database/db.php';

    $id = $_GET['id'];

    $query_cliente = "SELECT *
    FROM solicitacao
    INNER JOIN cliente
    ON id_cliente = cliente.id
    WHERE id_solicitacao = $id";

    $query = "SELECT * 
    FROM funcionario";

    $query_urgencia = "SELECT *
    FROM solicitacao
    WHERE id_solicitacao = $id";

    $query_status = "SELECT *
    FROM solicitacao
    WHERE id_solicitacao = $id";

    $query_data = "SELECT *
    FROM solicitacao
    WHERE id_solicitacao = $id";

    $result_cliente = $conn->query($query_cliente);
    $result_urgencia = $conn->query($query_urgencia);
    $result_status = $conn->query($query_status);
    $result_data = $conn->query($query_data);
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
    <form method="POST" action="../backend/update/update_request.php?id=<?php echo $id?>">
        <div>
            <label for="problema">Problema:</label>
            <textarea name="problema" disabled>
                <?php 
                    $query_problema = "SELECT * FROM solicitacao WHERE id_solicitacao = $id";
                    $result_problema = $conn->query($query_problema);
                    while($row = $result_problema->fetch_assoc()){
                        echo $row['descricao'];
                    }
                ?>
            </textarea>
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
                <?php if($result -> num_rows > 0) {
                    while($row = $result->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['nome_funcionario'];?></option>
<?php               }
                }?>
            </select>
            <label for="urgencia">Urgência:</label>
            <select name="urgencia">
                <?php if($result_urgencia -> num_rows > 0){
                    while($row = $result_urgencia->fetch_assoc()){
                        if($row['urgencia'] === "Baixa"){ ?>
                            <option value="Baixa"> <?php echo $row['urgencia']; ?> </option>
                            <option value="Média">Média</option>
                            <option value="Alta">Alta</option>

<?php                   } elseif ($row['urgencia'] === "Média"){ ?>
                            <option value="Em Andamento"> <?php echo $row['urgencia']; ?> </option>
                            <option value="Baixa">Baixa</option>
                            <option value="Alta">Alta</option>
<?php                   } else { ?>
                            <option value="Finalizada"> <?php echo $row['urgencia']; ?> </option>
                            <option value="Baixa">Baixa</option>
                            <option value="Média">Média</option>
<?php                   }
                    }
                }?>
            </select>
            <label for="status">Status:</label>
            <select name="status">
            <?php if($result_status -> num_rows > 0){
                    while($row = $result_status->fetch_assoc()){
                        if($row['status_solicitacao'] === "Pendente"){ ?>
                            <option value="Pendente"> <?php echo $row['status_solicitacao']; ?> </option>
                            <option value="Em Andamento">Em Andamento</option>
                            <option value="Finalizada">Finalizado</option>
<?php                   } elseif ($row['status_solicitacao'] === "Em Andamento"){ ?>
                            <option value="Em Andamento"> <?php echo $row['status_solicitacao']; ?> </option>
                            <option value="Pendente">Pendente</option>
                            <option value="Finalizada">Finalizado</option>
<?php                   } else { ?>
                            <option value="Finalizada"> <?php echo $row['status_solicitacao']; ?> </option>
                            <option value="Pendente">Pendente</option>
                            <option value="Em Andamento">Em Andamento</option>
<?php                   }
                    }
                }?>
            </select>
            <label for="data">Data de Abertura:</label>
            <?php 
                while($data = $result_data->fetch_assoc()){
                    $ano = substr($data['data_abertura'], 0, 4);
                    $mes = substr($data['data_abertura'], 5, 2);
                    $dia = substr($data['data_abertura'], 8, 2);
                }
            ?>
            <input type="date" name="data" value="<?php echo "$ano-" . "$mes-" . "$dia";  ?>" disabled>
        </div>
        <button>Enviar</button>
    </form>
</body>
</html>