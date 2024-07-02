<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);

    $sql = "DELETE FROM eventos WHERE id=?";
    $stmt = $conn->prepare($sql);

    // Verifica se a preparação da consulta falhou
    if ($stmt === false) {
        die('Erro na preparação da consulta SQL: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Evento excluído com sucesso.";
    } else {
        echo "Erro ao excluir o evento: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

    header('Location: index.php');
}
?>
