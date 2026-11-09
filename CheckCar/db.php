<?php
// Conexão central com o banco via PDO
// Todos os arquivos (index.php, relatorios.php, verificar_viatura.php) usam este arquivo.

$host   = "localhost";
$dbName = "checklistdeviaturas";
$username = "root";
$password = "";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$dbName;charset=$charset";

$opcoes = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,     // Lança exceção em erro, em vez de retornar false
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,           // fetch() já retorna array associativo
    PDO::ATTR_EMULATE_PREPARES   => false,                      // Usa prepared statements nativos (mais seguro)
];

try {
    $pdo = new PDO($dsn, $username, $password, $opcoes);
} catch (PDOException $e) {
    // Em produção, evite mostrar $e->getMessage() diretamente ao usuário
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}