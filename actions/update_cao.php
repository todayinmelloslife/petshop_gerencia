<?php
include '../includes/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_POST['id'];
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $raca = mysqli_real_escape_string($conn, $_POST['raca']);
    $idade = (int)$_POST['idade'];
    $dono = mysqli_real_escape_string($conn, $_POST['dono']);
    $observacoes = mysqli_real_escape_string($conn, $_POST['observacoes']);

    $updateQuery = "
        UPDATE caes
        SET nome = '$nome', raca = '$raca', idade = $idade, dono = '$dono', observacoes = '$observacoes'
        WHERE id = $id
    ";
    if (mysqli_query($conn, $updateQuery)) {
        header('Location: ../pages/listarDog.php');
        exit;
    } else {
        echo "Erro ao atualizar: " . mysqli_error($conn);
    }
} else {
    echo "Requisição inválida.";
}
?>
