<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="icon" href="./imgs/icon.png" type="image/png">
</head>
<body>
    <div class="container">
        <h1>Agenda</h1>
        <img src='./imgs/icon.png' alt='Agenda' id='icon' onClick='toggleForm();'/>
        <form id="evento-form" method="POST" action="add_event.php">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" maxlength="100" minlength="3" required>
            <br>
            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao"></textarea>
            <br>
            <label for="data">Data e Hora</label>
            <input type="datetime-local" id="data" name="data" required>
            <br>
            <button type="submit">Adicionar Evento</button>
        </form>
        <h2>Eventos</h2>
        <ul id="eventos-lista">
            <?php
            include 'config.php';

            // Definir o fuso horário para São Paulo
            date_default_timezone_set('America/Sao_Paulo');

            // Obter a data atual no fuso horário de São Paulo
            $data_atual = new DateTime();

            $sql = "SELECT * FROM eventos order by data";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Converter a data do evento para um objeto DateTime
                    $data_evento = new DateTime($row['data']);
                    $data_formatada = date('d/m/y H:i', strtotime($row['data']));
                    $corDeFundo = $data_evento < $data_atual ? '#f2ec44' : '#eee'; // Condicional para definir a cor
                    echo "<li style='background-color: {$corDeFundo};'>
                            <span id='span_{$row['id']}' onClick='mostraDesc({$row['id']});'>
                                {$data_formatada} - {$row['titulo']} : {$row['descricao']}
                            </span>
                            <div id='action-buttons'>
                                <form method='POST' action='delete_event.php'>
                                    <input type='hidden' name='id' value='{$row['id']}'>
                                    <button style='background-color: #ed4337; margin-bottom: 0;' type='submit'><img src='./imgs/excluir.png' alt='Lixeira'/></button>
                                </form>
                                <form method='GET' action='edit_event.php'>
                                    <input type='hidden' name='id' value='{$row['id']}'>
                                    <button style='background-color: #58FFEF; margin-bottom: 0;' type='submit'><img src='./imgs/editar.png' alt='Lápis de edição'/></button>
                                </form>
                            </div>
                        </li>";
                }
            } else {
                echo "Nenhum evento encontrado.";
            }
            $conn->close();
            ?>
        </ul>
    </div>
    <script src="./scripts/index.js"></script>
</body>
</html>