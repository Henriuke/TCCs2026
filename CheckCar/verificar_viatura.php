<?php
header('Content-Type: application/json');

// 1. Conexão via PDO
require_once "db.php"; // fornece $pdo (PDO já conectado)

if (!isset($_GET['prefixo'])) {
    echo json_encode(['status' => 'ok']);
    exit;
}

$prefixo = $_GET['prefixo'];

// 2. Pega o último relatório da tabela de SAÍDA
$stmtSaida = $pdo->prepare("SELECT * FROM checklistdesaida WHERE PrefixoDaViatura = :prefixo ORDER BY DataAtual DESC, HorarioDeSaida DESC LIMIT 1");
$stmtSaida->execute([':prefixo' => $prefixo]);
$saida = $stmtSaida->fetch();

// 3. Pega o último relatório da tabela de ENTRADA
$stmtEntrada = $pdo->prepare("SELECT * FROM checklistdeentrada WHERE PrefixoDaViatura2 = :prefixo ORDER BY DataAtual2 DESC, HorarioDeEntrada DESC LIMIT 1");
$stmtEntrada->execute([':prefixo' => $prefixo]);
$entrada = $stmtEntrada->fetch();

$ultimoRelatorio = null;
$tipo = '';

// 4. Descobre de forma simples qual dos dois relatórios é o mais novo de todos
if ($saida && $entrada) {
    $tempoSaida = strtotime($saida['DataAtual'] . ' ' . $saida['HorarioDeSaida']);
    $tempoEntrada = strtotime($entrada['DataAtual2'] . ' ' . $entrada['HorarioDeEntrada']);
    
    if ($tempoSaida > $tempoEntrada) {
        $ultimoRelatorio = $saida;
        $tipo = 'saida';
    } else {
        $ultimoRelatorio = $entrada;
        $tipo = 'entrada';
    }
} elseif ($saida) {
    $ultimoRelatorio = $saida;
    $tipo = 'saida';
} elseif ($entrada) {
    $ultimoRelatorio = $entrada;
    $tipo = 'entrada';
}

// 5. Se achou um relatório, verifica item por item se está "Ruim"
if ($ultimoRelatorio) {
    $problemas = [];

    if ($tipo == 'saida') {
        if ($ultimoRelatorio['EstadoDeLuzes'] == 'Ruim') $problemas[] = "Luzes: " . $ultimoRelatorio['ProblemaNasLuzes'];
        if ($ultimoRelatorio['EstadoDosPneus'] == 'Ruim') $problemas[] = "Pneus: " . $ultimoRelatorio['ProblemaNosPneus'];
        if ($ultimoRelatorio['EstadoDoRadioComunicador'] == 'Ruim') $problemas[] = "Rádio: " . $ultimoRelatorio['ProblemaNoRadioComunicador'];
        if ($ultimoRelatorio['EstadoDaSirene'] == 'Ruim') $problemas[] = "Sirene: " . $ultimoRelatorio['ProblemaNaSirene'];
        if ($ultimoRelatorio['EstadoDoGiroflex'] == 'Ruim') $problemas[] = "Giroflex: " . $ultimoRelatorio['ProblemaNoGiroflex'];
        if ($ultimoRelatorio['LiquidoDeArrefecimento'] == 'Ruim') $problemas[] = "Líquido de Arrefecimento Está Ruim";
        if ($ultimoRelatorio['NivelDoOleo'] == 'Ruim') $problemas[] = "Nível do Óleo Está Ruim";
    } else {
        if ($ultimoRelatorio['EstadoDeLuzes2'] == 'Ruim') $problemas[] = "Luzes: " . $ultimoRelatorio['ProblemaNasLuzes2'];
        if ($ultimoRelatorio['EstadoDosPneus2'] == 'Ruim') $problemas[] = "Pneus: " . $ultimoRelatorio['ProblemaNosPneus2'];
        if ($ultimoRelatorio['EstadoDoRadioComunicador2'] == 'Ruim') $problemas[] = "Rádio: " . $ultimoRelatorio['ProblemaNoRadioComunicador2'];
        if ($ultimoRelatorio['EstadoDaSirene2'] == 'Ruim') $problemas[] = "Sirene: " . $ultimoRelatorio['ProblemaNaSirene2'];
        if ($ultimoRelatorio['EstadoDoGiroflex2'] == 'Ruim') $problemas[] = "Giroflex: " . $ultimoRelatorio['ProblemaNoGiroflex2'];
        if ($ultimoRelatorio['LiquidoDeArrefecimento2'] == 'Ruim') $problemas[] = "Líquido de Arrefecimento Está Ruim";
        if ($ultimoRelatorio['NivelDoOleo2'] == 'Ruim') $problemas[] = "Nível do Óleo Está Ruim";
    }

    // Se encontrou alguma coisa ruim, avisa o JavaScript
    if (count($problemas) > 0) {
        echo json_encode(['status' => 'ruim', 'problemas' => $problemas]);
        exit;
    }
}

// Se tiver tudo bem ou não encontrar a viatura, retorna OK
echo json_encode(['status' => 'ok']);
?>