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
    $produto = mysqli_real_escape_string($conn, $_POST['produto']);

    // Handle file upload
    $fotoPath = null;
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $fotoDir = '../uploads/';
        if (!is_dir($fotoDir)) {
            mkdir($fotoDir, 0777, true); // Create the directory if it doesn't exist
        }
        $fotoPath = $fotoDir . basename($_FILES['foto']['name']);
        if (!move_uploaded_file($_FILES['foto']['tmp_name'], $fotoPath)) {
            die('Erro ao fazer upload da foto.');
        }
    }

    // Create the table if it doesn't exist
    $createTableQuery = "
        CREATE TABLE IF NOT EXISTS caes (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100) NOT NULL,
            raca VARCHAR(100) NOT NULL,
            idade INT NOT NULL,
            dono VARCHAR(100) NOT NULL,
            observacoes TEXT,
            foto VARCHAR(255) DEFAULT NULL,
            produto VARCHAR(50) DEFAULT NULL
        )
    ";
    if (!mysqli_query($conn, $createTableQuery)) {
        die('Erro ao criar tabela: ' . mysqli_error($conn));
    }

    // Insert the data into the table
    $insertQuery = "
        INSERT INTO caes (nome, raca, idade, dono, observacoes, foto, produto)
        VALUES ('$nome', '$raca', $idade, '$dono', '$observacoes', '$fotoPath', '$produto')
    ";
    if (mysqli_query($conn, $insertQuery)) {
        header('Location: ../pages/listarDog.php'); // Redirect to listarDog.php
        exit;
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conn);
    }
}
?>
