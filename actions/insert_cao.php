<?php
include '../includes/conexao.php'; // Include the database connection

// Check if the form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($conn)) {
        die('Erro: Conexão com o banco de dados não foi estabelecida.');
    }

    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $raca = mysqli_real_escape_string($conn, $_POST['raca']);
    $idade = (int)$_POST['idade'];
    $dono = mysqli_real_escape_string($conn, $_POST['dono']);
    $observacoes = mysqli_real_escape_string($conn, $_POST['observacoes']);

    // Create the table if it doesn't exist
    $createTableQuery = "
        CREATE TABLE IF NOT EXISTS caes (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100) NOT NULL,
            raca VARCHAR(100) NOT NULL,
            idade INT NOT NULL,
            dono VARCHAR(100) NOT NULL,
            observacoes TEXT
        )
    ";
    if (!mysqli_query($conn, $createTableQuery)) {
        die('Erro ao criar tabela: ' . mysqli_error($conn));
    }

    // Insert the data into the table
    $insertQuery = "
        INSERT INTO caes (nome, raca, idade, dono, observacoes)
        VALUES ('$nome', '$raca', $idade, '$dono', '$observacoes')
    ";
    if (mysqli_query($conn, $insertQuery)) {
        header('Location: ../pages/listarDog.php'); // Redirect to listarDog.php
        exit;
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conn);
    }
}
?>
