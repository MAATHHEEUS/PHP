<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agenda_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!-- Infinityfree -->
<?php
// $servername = "sqlXXX.infinityfree.com"; // Atualize com o servidor correto
// $username = "epiz_XXXXXX"; // Atualize com o nome de usuário correto
// $password = "XXXXX"; // Atualize com a senha correta
// $dbname = "epiz_XXXXXX_agenda_db"; // Atualize com o nome do banco de dados correto

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
?>