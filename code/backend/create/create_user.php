<?php

    include "../database/db.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $CPF = $_POST['CPF'];

        $query = "INSERT INTO cliente (nome, email, telefone, CPF)
        VALUES ('$name', '$email', '$telefone', '$CPF')";

        $result = $conn->query($query);

        if($result === true){
            echo "Cliente registrado com sucesso! 😙"; ?>
            <a href="../../frontend/index.html"><button>Voltar</button></a>
            <?php       
        } else {
            echo "Dados inválidos! 😯";
        }
    }