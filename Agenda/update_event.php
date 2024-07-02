<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];

    $sql = "UPDATE eventos SET titulo=?, descricao=?, data=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    // Verifica se a preparação da consulta falhou
    if ($stmt === false) {
        die('Erro na preparação da consulta SQL: ' . htmlspecialchars($conn->error));
    }
    $stmt->bind_param("sssi", $titulo, $descricao, $data, $id);

    if ($stmt->execute()) {
        echo "Evento atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar o evento: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

    header('Location: index.php');
}
?>