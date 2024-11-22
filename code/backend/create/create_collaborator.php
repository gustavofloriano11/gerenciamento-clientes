<?php 

    include '../database/db.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $query = "INSERT INTO funcionario (nome_funcionario, email, telefone)
        VALUES ('$name', '$email', '$telefone')";

        $result = $conn->query($query);

        if($result === true){
            echo "Funcionário registrado com sucesso! 😙"; ?>
            <a href="../../frontend/index.html"><button>Voltar</button></a>
            <?php       
        } else {
            echo "Dados inválidos! 😯";
        }
    }