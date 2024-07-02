<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT * FROM eventos WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $titulo = $row['titulo'];
        $descricao = $row['descricao'];
        $data = date('Y-m-d\TH:i', strtotime($row['data'])); // Formato para input datetime-local
    } else {
        echo "Evento não encontrado.";
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID inválido.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Evento</title>
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="icon" href="./imgs/icon.png" type="image/png">
</head>
<body>
    <div class="container">
        <h1>Editar Evento</h1>
        <form id="evento-form" method="POST" action="update_event.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $titulo; ?>" required>
            <br>
            <label for="descricao">Descrição:</label>
            <textarea type="text" id="descricao" name="descricao"><?php echo htmlspecialchars($descricao); ?></textarea>
            <br>
            <label for="data">Data e Hora:</label>
            <input type="datetime-local" id="data" name="data" value="<?php echo $data; ?>" required>
            <br>
            <button type="submit">Atualizar Evento</button>
        </form>
    </div>
</body>
</html>
