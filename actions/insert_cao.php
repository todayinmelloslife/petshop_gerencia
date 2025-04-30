<?php
include '../includes/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $raca = $_POST['raca'] ?? '';
    $idade = $_POST['idade'] ?? '';
    $dono = $_POST['dono'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $observacoes = $_POST['observacoes'] ?? '';

    $foto = '';
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto = uniqid() . '-' . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], '../uploads/' . $foto);
    }

    $sql = "CREATE TABLE IF NOT EXISTS patos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255),
        raca VARCHAR(255),
        idade INT,
        dono VARCHAR(255),
        telefone VARCHAR(255),
        observacoes TEXT,
        foto VARCHAR(255)
    )";
    $conn->query($sql);

    $stmt = $conn->prepare("INSERT INTO patos (nome, raca, idade, dono, telefone, observacoes, foto) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssissss", $nome, $raca, $idade, $dono, $telefone, $observacoes, $foto);
    $stmt->execute();

    header('Location: ../pages/listarDog.php');
    exit;
}
?>
