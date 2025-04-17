<?php
include '../includes/conexao.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $deleteQuery = "DELETE FROM caes WHERE id = $id";
    if (mysqli_query($conn, $deleteQuery)) {
        header('Location: ../pages/listarDog.php'); // Redirect back to the list
        exit;
    } else {
        echo "Erro ao excluir: " . mysqli_error($conn);
    }
} else {
    echo "ID inválido.";
}
?>
