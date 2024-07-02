<?php
include 'config.php';

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$data = $_POST['data'];

$sql = "INSERT INTO eventos (titulo, descricao, data) VALUES ('$titulo', '$descricao', '$data')";

if ($conn->query($sql) === TRUE) {
    echo "Novo evento criado com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: index.php");
?>
