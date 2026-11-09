<?php 
 require_once "db.php"; // fornece $pdo (PDO já conectado)

// Trata o upload de uma imagem de forma segura. Retorna o nome do arquivo
// salvo (para gravar no banco) ou null se nenhuma imagem foi enviada
// (o envio de imagem é sempre opcional).
function tratarUploadImagem(string $campo): ?string {
    if (empty($_FILES[$campo]) || $_FILES[$campo]['error'] === UPLOAD_ERR_NO_FILE) {
        return null; // Usuário não anexou imagem - tudo bem, é opcional
    }
    if ($_FILES[$campo]['error'] !== UPLOAD_ERR_OK) {
        return null; // Houve algum erro no envio, ignora silenciosamente
    }

    $tamanhoMaximo = 5 * 1024 * 1024; // 5MB
    if ($_FILES[$campo]['size'] > $tamanhoMaximo) {
        return null;
    }

    $tmpPath = $_FILES[$campo]['tmp_name'];

    // Valida o tipo real do arquivo lendo seus bytes, nunca confiando
    // apenas na extensão ou no nome enviado pelo navegador
    $tiposPermitidos = [
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/webp' => 'webp',
    ];
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($tmpPath);

    if (!isset($tiposPermitidos[$mime])) {
        return null; // Tipo de arquivo não permitido
    }

    $extensao = $tiposPermitidos[$mime];
    $nomeArquivo = bin2hex(random_bytes(16)) . '.' . $extensao;
    $pastaDestino = __DIR__ . '/uploads_problemas/';

    if (!is_dir($pastaDestino)) {
        mkdir($pastaDestino, 0755, true);
    }

    if (move_uploaded_file($tmpPath, $pastaDestino . $nomeArquivo)) {
        return $nomeArquivo;
    }

    return null;
}

    if(isset($_POST['btn1saida'])){

   $nomeDeGuerra = $_POST['NomeDeGuerra'] ?? '';
   $idFunc = $_POST['IdFunc'] ?? '';
   $data = $_POST['Data'] ?? '';
   $horarioDeSaida = $_POST['HorarioDeSaida'] ?? '';
   $missao = $_POST['Missao'] ?? '';
   $prefixoDeViatura = $_POST['PrefixoDeViatura'] ?? '';
   $kmAtual = $_POST['KmAtual'] ?? '';
   $estadoLiquidoDeArrefecimento = $_POST['EstadoDoLiquidoDeArrefecimento'] ?? '';
   $nivelDoOleo = $_POST['NivelDoOleo'] ?? '';
   $kmTrocaDeOleo = $_POST['KmTrocaDeOleo'] ?? '';
   $estadoLuzes = $_POST['EstadoLuzes'] ?? '';
   $problemaNasLuzes = $_POST['ProblemaNasLuzes'] ?? '';
   $imagemLuzes = tratarUploadImagem('ImagemProblemaNasLuzes');
   $estadoPneus = $_POST['EstadoPneus'] ?? '';
   $problemaNosPneus = $_POST['ProblemaNosPneus'] ?? '';
   $imagemPneus = tratarUploadImagem('ImagemProblemaNosPneus');
   $condicaoDaLataria = $_POST['CondicaoDaLataria'] ?? '';
   $estadoRadioComunicador = $_POST['EstadoRadioComunicador'] ?? '';
   $problemaNoRadioComunicador = $_POST['ProblemaNoRadioComunicador'] ?? '';
   $imagemRadio = tratarUploadImagem('ImagemProblemaNoRadioComunicador');
   $estadoSirene = $_POST['EstadoSirene'] ?? '';
   $problemaNaSirene = $_POST['ProblemaNaSirene'] ?? '';
   $imagemSirene = tratarUploadImagem('ImagemProblemaNaSirene');
   $estadoGiroflex = $_POST['EstadoGiroflex'] ?? '';
   $problemaGiroflex = $_POST['ProblemaNoGiroflex'] ?? '';
   $imagemGiroflex = tratarUploadImagem('ImagemProblemaNoGiroflex');
   $saldoDeCombustivel = $_POST['SaldoDeCombustivel'] ?? '';
   $observacoes = $_POST['Observacoes'] ?? '';
    echo "<script>alert('Checklist de Saída Enviado com sucesso!');</script>";

   $sql = "INSERT INTO checklistdesaida
        (NomeDeGuerra, idFuncionario, DataAtual, HorarioDeSaida, Missao, PrefixoDaViatura, KMatual,
         LiquidoDeArrefecimento, NivelDoOleo, KilometragemParaProximaTrocadeOleo, EstadoDeLuzes,
         ProblemaNasLuzes, ImagemLuzes, EstadoDosPneus, ProblemaNosPneus, ImagemPneus, CondicaoGeraldaLataria,
         EstadoDoRadioComunicador, ProblemaNoRadioComunicador, ImagemRadio, EstadoDaSirene, ProblemaNaSirene,
         ImagemSirene, EstadoDoGiroflex, ProblemaNoGiroflex, ImagemGiroflex, Saldoaproximadodecombustivel, observacoes)
        VALUES
        (:nomeDeGuerra, :idFunc, :data, :horarioDeSaida, :missao, :prefixoDeViatura, :kmAtual,
         :estadoLiquidoDeArrefecimento, :nivelDoOleo, :kmTrocaDeOleo, :estadoLuzes,
         :problemaNasLuzes, :imagemLuzes, :estadoPneus, :problemaNosPneus, :imagemPneus, :condicaoDaLataria,
         :estadoRadioComunicador, :problemaNoRadioComunicador, :imagemRadio, :estadoSirene, :problemaNaSirene,
         :imagemSirene, :estadoGiroflex, :problemaGiroflex, :imagemGiroflex, :saldoDeCombustivel, :observacoes)";

   $stmt = $pdo->prepare($sql);
   $stmt->execute([
        ':nomeDeGuerra'                 => $nomeDeGuerra,
        ':idFunc'                       => $idFunc,
        ':data'                         => $data,
        ':horarioDeSaida'               => $horarioDeSaida,
        ':missao'                       => $missao,
        ':prefixoDeViatura'             => $prefixoDeViatura,
        ':kmAtual'                      => $kmAtual,
        ':estadoLiquidoDeArrefecimento' => $estadoLiquidoDeArrefecimento,
        ':nivelDoOleo'                  => $nivelDoOleo,
        ':kmTrocaDeOleo'                => $kmTrocaDeOleo,
        ':estadoLuzes'                  => $estadoLuzes,
        ':problemaNasLuzes'             => $problemaNasLuzes,
        ':imagemLuzes'                  => $imagemLuzes,
        ':estadoPneus'                  => $estadoPneus,
        ':problemaNosPneus'             => $problemaNosPneus,
        ':imagemPneus'                  => $imagemPneus,
        ':condicaoDaLataria'            => $condicaoDaLataria,
        ':estadoRadioComunicador'       => $estadoRadioComunicador,
        ':problemaNoRadioComunicador'   => $problemaNoRadioComunicador,
        ':imagemRadio'                  => $imagemRadio,
        ':estadoSirene'                 => $estadoSirene,
        ':problemaNaSirene'             => $problemaNaSirene,
        ':imagemSirene'                 => $imagemSirene,
        ':estadoGiroflex'               => $estadoGiroflex,
        ':problemaGiroflex'             => $problemaGiroflex,
        ':imagemGiroflex'               => $imagemGiroflex,
        ':saldoDeCombustivel'           => $saldoDeCombustivel,
        ':observacoes'                  => $observacoes,
   ]);
    }
    if(isset($_POST['btn2entrada'])){
  $nomeDeGuerra2 = $_POST['NomeDeGuerra2'] ?? '';
   $idFunc2 = $_POST['IdFunc2'] ?? '';
   $data2 = $_POST['Data2'] ?? '';
   $horarioDeEntrada = $_POST['HorarioDeEntrada2'] ?? '';
   $prefixoDeViatura2 = $_POST['PrefixoDeViatura2'] ?? '';
   $kmAtual2 = $_POST['KmAtual2'] ?? '';
   $estadoLiquidoDeArrefecimento2 = $_POST['EstadoDoLiquidoDeArrefecimento2'] ?? '';
   $nivelDoOleo2 = $_POST['NivelDoOleo2'] ?? '';
   $kmTrocaDeOleo2 = $_POST['KmTrocaDeOleo2'] ?? '';
   $estadoLuzes2 = $_POST['EstadoLuzes2'] ?? '';
   $problemaNasLuzes2 = $_POST['ProblemaNasLuzes2'] ?? '';
   $imagemLuzes2 = tratarUploadImagem('ImagemProblemaNasLuzes2');
   $estadoPneus2 = $_POST['EstadoPneus2'] ?? '';
   $problemaNosPneus2 = $_POST['ProblemaNosPneus2'] ?? '';
   $imagemPneus2 = tratarUploadImagem('ImagemProblemaNosPneus2');
   $condicaoDaLataria2 = $_POST['CondicaoDaLataria2'] ?? '';
   $estadoRadioComunicador2 = $_POST['EstadoRadioComunicador2'] ?? '';
   $problemaNoRadioComunicador2 = $_POST['ProblemaNoRadioComunicador2'] ?? '';
   $imagemRadio2 = tratarUploadImagem('ImagemProblemaNoRadioComunicador2');
   $estadoSirene2 = $_POST['EstadoSirene2'] ?? '';
   $problemaNaSirene2 = $_POST['ProblemaNaSirene2'] ?? '';
   $imagemSirene2 = tratarUploadImagem('ImagemProblemaNaSirene2');
   $estadoGiroflex2 = $_POST['EstadoGiroflex2'] ?? '';
   $problemaGiroflex2 = $_POST['ProblemaNoGiroflex2'] ?? '';
   $imagemGiroflex2 = tratarUploadImagem('ImagemProblemaNoGiroflex2');
   $saldoDeCombustivel2 = $_POST['SaldoDeCombustivel2'] ?? '';
   $observacoes2 = $_POST['Observacoes2'] ?? '';
    echo "<script>alert('Checklist de Entrada Enviado com sucesso!');</script>";

   $sql2 = "INSERT INTO checklistdeentrada
        (NomeDeGuerra2, idFuncionario2, DataAtual2, HorarioDeEntrada, PrefixoDaViatura2, KMatual2,
         LiquidoDeArrefecimento2, NivelDoOleo2, KilometragemParaProximaTrocadeOleo2, EstadoDeLuzes2,
         ProblemaNasLuzes2, ImagemLuzes2, EstadoDosPneus2, ProblemaNosPneus2, ImagemPneus2, CondicaoGeraldaLataria2,
         EstadoDoRadioComunicador2, ProblemaNoRadioComunicador2, ImagemRadio2, EstadoDaSirene2, ProblemaNaSirene2,
         ImagemSirene2, EstadoDoGiroflex2, ProblemaNoGiroflex2, ImagemGiroflex2, Saldoaproximadodecombustivel2, observacoes2)
        VALUES
        (:nomeDeGuerra2, :idFunc2, :data2, :horarioDeEntrada, :prefixoDeViatura2, :kmAtual2,
         :estadoLiquidoDeArrefecimento2, :nivelDoOleo2, :kmTrocaDeOleo2, :estadoLuzes2,
         :problemaNasLuzes2, :imagemLuzes2, :estadoPneus2, :problemaNosPneus2, :imagemPneus2, :condicaoDaLataria2,
         :estadoRadioComunicador2, :problemaNoRadioComunicador2, :imagemRadio2, :estadoSirene2, :problemaNaSirene2,
         :imagemSirene2, :estadoGiroflex2, :problemaGiroflex2, :imagemGiroflex2, :saldoDeCombustivel2, :observacoes2)";

   $stmt2 = $pdo->prepare($sql2);
   $stmt2->execute([
        ':nomeDeGuerra2'                 => $nomeDeGuerra2,
        ':idFunc2'                       => $idFunc2,
        ':data2'                         => $data2,
        ':horarioDeEntrada'              => $horarioDeEntrada,
        ':prefixoDeViatura2'             => $prefixoDeViatura2,
        ':kmAtual2'                      => $kmAtual2,
        ':estadoLiquidoDeArrefecimento2' => $estadoLiquidoDeArrefecimento2,
        ':nivelDoOleo2'                  => $nivelDoOleo2,
        ':kmTrocaDeOleo2'                => $kmTrocaDeOleo2,
        ':estadoLuzes2'                  => $estadoLuzes2,
        ':problemaNasLuzes2'             => $problemaNasLuzes2,
        ':imagemLuzes2'                  => $imagemLuzes2,
        ':estadoPneus2'                  => $estadoPneus2,
        ':problemaNosPneus2'             => $problemaNosPneus2,
        ':imagemPneus2'                  => $imagemPneus2,
        ':condicaoDaLataria2'            => $condicaoDaLataria2,
        ':estadoRadioComunicador2'       => $estadoRadioComunicador2,
        ':problemaNoRadioComunicador2'   => $problemaNoRadioComunicador2,
        ':imagemRadio2'                  => $imagemRadio2,
        ':estadoSirene2'                 => $estadoSirene2,
        ':problemaNaSirene2'             => $problemaNaSirene2,
        ':imagemSirene2'                 => $imagemSirene2,
        ':estadoGiroflex2'               => $estadoGiroflex2,
        ':problemaGiroflex2'             => $problemaGiroflex2,
        ':imagemGiroflex2'               => $imagemGiroflex2,
        ':saldoDeCombustivel2'           => $saldoDeCombustivel2,
        ':observacoes2'                  => $observacoes2,
   ]);
    }

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checklist de Viaturas</title>
    <link rel="stylesheet" href="styles.css?v=2">
    <link rel="shortcut icon" href="imagens/LogoBrigada4K.png">

</head>
<body class="pagina-home">
    <header>
        <nav>
            <a class="logo" href="">CHECKLIST DE VIATURAS</a>
            <div class="icone-menu">
                <div class="linha1"></div>
                <div class="linha2"></div>
                <div class="linha3"></div>
            </div>
              <ul class="nav-list">
                <li><a href="index.php" target="_self">Home</a></li>
                <li><a href="relatorios.php" target="_self">Relatórios</a></li>
                <li><a href="#" id="btn-suporte">Suporte</a></li>
                <li><a href="https://www.brigadamilitar.rs.gov.br/inicial" target="_blank">Site Oficial</a></li>
                <li><a href="#" id="btn-sobre">Sobre</a></li>
            </ul>
        </nav>
    </header>

    <div id="modal-suporte" class="modal-suporte">
    <div class="modal-conteudo">
        <span class="fechar-modal" id="fechar-suporte">&times;</span>
        <h2>Contatos de Suporte</h2>
        <p><strong>Henrique Terres:</strong> <a href="https://wa.me/5553997067036" target="_blank">53 99706-7036</a></p>
        <p><strong>Milena Milbrath:</strong> <a href="https://wa.me/5553991450653" target="_blank">53 99145-0653</a></p>
        <p><strong>Valentina Nunes:</strong> <a href="https://wa.me/5553991846160" target="_blank">53 99184-6160</a></p>
        <p><strong>Jose Henrique Lopes da Silva: jose-hlsilva@educar.rs.gov.br</strong> </p>
        <p><strong>Leonardo Santana Benevides: leonardo-benevides@educar.rs.gov.br</strong> </p>
        <p><strong>Simoni Machado Gomes: simoni-gomes1@educar.rs.gov.br</strong> </p>

    </div>
    </div>

    <div id="modal-sobre" class="modal-suporte" style="display: none;">
    <div class="modal-conteudo">
        <span class="fechar-modal" id="fechar-sobre">&times;</span>
        <h2>Sobre o CheckCar</h2>
        <div style="text-align: justify; font-size: 0.95rem; line-height: 1.5;">
            <p>O Projeto Checkcar tem como objetivo de desenvolver um site de uma lista de controle de defeitos das viaturas para a brigada militar. A proposta é que o brigadiano documente a retirada do veículo e que possa deixar registrado qualquer mínimo defeito que apareça na viatura, a partir do relatório criado, ajudará a direcionar ao encontro da falha no veículo, aparente ou não, e facilitará o concerto após cada operação. No preenchimento dos checklists, serão solicitadas informações como o estado do veículo, condições das peças e o registro de problemas. Foram usados no Desenvolvimento do Checklist as linguagens Html, CSS e Javascript, para o banco de dados, será utilizado o Xampp e a linguagem PHP, ele trará maior agilidade e facilidade, quando em boa parte dos casos essas checklists são feitas manualmente, além de trazer um resultado mais preciso.
</p>
        </div>
    </div>
    </div>

    <script>
   document.addEventListener("DOMContentLoaded", function() {
    //LÓGICA DO SUPORTE 
    let btnSuporte = document.getElementById("btn-suporte");
    let modalSuporte = document.getElementById("modal-suporte");
    let btnFecharSuporte = document.getElementById("fechar-suporte");

    if (btnSuporte && modalSuporte && btnFecharSuporte) {
        btnSuporte.addEventListener("click", function(event) {
            event.preventDefault(); 
            modalSuporte.style.display = "block";
        });
        btnFecharSuporte.addEventListener("click", function() {
            modalSuporte.style.display = "none";
        });
    }

    //LÓGICA DO SOBRE
    let btnSobre = document.getElementById("btn-sobre");
    let modalSobre = document.getElementById("modal-sobre");
    let btnFecharSobre = document.getElementById("fechar-sobre");

    if (btnSobre && modalSobre && btnFecharSobre) {
        btnSobre.addEventListener("click", function(event) {
            event.preventDefault(); 
            modalSobre.style.display = "block";
        });
        btnFecharSobre.addEventListener("click", function() {
            modalSobre.style.display = "none";
        });
    }

    //Fechar qualquer modal se clicar fora da caixinha (no fundo escuro)
    window.addEventListener("click", function(event) {
        if (event.target == modalSuporte) {
            modalSuporte.style.display = "none";
        }
        if (event.target == modalSobre) {
            modalSobre.style.display = "none";
        }
     });
    });
    </script>

    <img src="imagens/LogoBrigada4K.png" alt="Logo da Brigada Militar RS" width="100px" height="100px" class="Logo">
    <div class="Brasoes">
        <!--<img src="imagens/aguia marrom1.png" alt="Brasão Aguia Marrom" class="Brasao" id="AguiaMarrom">-->
        <img src="imagens/Brasão 6º BPM.png" alt="Brasão 6 BPM" class="Brasao" id="Brasão6BPM">
        <img src="imagens/Brasão Força Tática.png" alt="Brasão Força Tática" class="Brasao" id="BrasãoFT">
        <!--<img src="imagens/Breve CEFT.png" alt="Brasão CEFT" class="Brasao" id="BrasãoCEFT">-->
        <img src="imagens/breve_canil_linha.png" alt="Brasão Canil" class="Brasao" id="BrasãoCanil">
        <img src="imagens/rocam rio grande png.png" alt="Brasão Rocam" class="Brasao" id="BrasãoRocam">

    </div>

    <h1>CHECKLIST DE SAÍDA DE VIATURAS</h1>
    <hr>
    <form action="index.php" method="post" id="formSaida" enctype="multipart/form-data">
    <input type="hidden" name="tipo" value="saida">
        <details class="accordion1">
            <summary>Abrir Checklist De Saída</summary>
        <label for="NomeDeGuerra">Nome de Guerra:</label>
        <input type="text" name="NomeDeGuerra" id="NomeDeGuerra" inputmode="text" maxlength="500" required>
        <br>
        <label for="IdFunc">ID FUNCIONÁRIO:</label>
        <input type="text" name="IdFunc" id="IdFunc" placeholder="Digite seu ID" pattern="[0-9]+" inputmode="numeric" title="Use apenas Números" maxlength="255" required>
        <br>
        <label for="Data">DATA ATUAL:</label>
        <input type="date" name="Data" id="Data" required>
        <br>
        <label for="HorarioDeSaída">Horário de Saída:</label>
        <input type="time" name="HorarioDeSaida" id="HorarioDeSaida" required>
        <br>
        <label for="Missão">Missão:</label>
        <input type="text" name="Missao" id="Missao" inputmode="text" maxlength="1000">
        <br>
        <details class="accordion2">
            <summary>Mais</summary>
        <label for="PrefixoDeViatura"><h3>PREFIXO DA VIATURA</h3></label>
        <input type="text" name="PrefixoDeViatura" id="PrefixoDeViatura" placeholder="Use Apenas Números" pattern="[0-9]+" inputmode="numeric" title="Use Apenas Números" maxlength="255" required>
        <br>
        <label for="KmAtual"><h3>KM Atual:</h3></label>
        <input type="text" name="KmAtual" id="KmAtual" placeholder="Use Apenas Números" pattern="[0-9]+" inputmode="numeric" title="Use Apenas Números" maxlength="255" required>
        <br>
        <h3>LÍQUIDO DE ARREFECIMENTO</h3>
        <label for="LiquidoDeArrefecimentoBom">Marcar Apenas uma Opção:</label>
        <br>
        <input type="radio" name="EstadoDoLiquidoDeArrefecimento" id="LiquidoDeArrefecimentoBom" value="Bom" required>
        <label for="LiquidoDeArrefecimentoBom">BOM</label>
        <br>
        <input type="radio" name="EstadoDoLiquidoDeArrefecimento" id="LiquidoDeArrefecimentoRuim" value="Ruim">
        <label for="LiquidoDeArrefecimentoRuim">RUIM</label>
        <br>
        <h3>NÍVEL DO ÓLEO</h3>
        <label for="NivelDoOleoBom">Marcar Apenas uma Opção:</label>
        <br>
        <input type="radio" name="NivelDoOleo" id="NivelDoOleoBom" value="Bom" required>
        <label for="NivelDoOleoBom">BOM</label>
        <br>
        <input type="radio" name="NivelDoOleo" id="NivelDoOleoRuim" value="Ruim" required>
        <label for="NivelDoOleoRuim">RUIM</label>
        <br>
        <label for="KmTrocaDeOleo"><h3>Kilometragem para Próxima Troca de Óleo:</h3></label>
        <input type="text" name="KmTrocaDeOleo" id="KmTrocaDeOleo" placeholder="Use Apenas Números" pattern="[0-9]+" inputmode="numeric" title="Use Apenas Números" maxlength="255" required>
        <h3>LUZES</h3>
        <label for="EstadoLuzesBom">Marcar apenas uma Opção:</label>
        <br>
        <input type="radio" name="EstadoLuzes" id="EstadoLuzesBom" value="Bom" required>
        <label for="EstadoLuzesBom">BOM</label>
        <br>
        <input type="radio" name="EstadoLuzes" id="EstadoLuzesRuim" value="Ruim" required>
        <label for="EstadoLuzesRuim">RUIM</label>
        <br>
        <label for="ProblemaNasLuzes"><h3 id="DescrevaProblemaNasLuzes">Descreva o Problema nas Luzes:</h3></label>
        <textarea name="ProblemaNasLuzes" id="ProblemaNasLuzes" inputmode="text" maxlength="500"></textarea>
        <br>
        <label for="ImagemProblemaNasLuzes" id="LabelImagemProblemaNasLuzes">Anexar Foto do Problema (opcional):</label>
        <input type="file" name="ImagemProblemaNasLuzes" id="ImagemProblemaNasLuzes" accept="image/png, image/jpeg, image/webp">
        <br>
        <h3>PNEUS</h3>
        <label for="EstadoPneusBom">Marcar apenas uma Opção:</label>
        <br>
        <input type="radio" name="EstadoPneus" id="EstadoPneusBom" value="Bom" required>
        <label for="EstadoPneusBom">BOM</label>
        <br>
        <input type="radio" name="EstadoPneus" id="EstadoPneusRuim" value="Ruim" required>
        <label for="EstadoPneusRuim">RUIM</label>
        <label for="ProblemaNosPneus"><h3 id="DescrevaProblemaNosPneus">Descreva o Problema nos Pneus:</h3></label>
        <textarea name="ProblemaNosPneus" id="ProblemaNosPneus" inputmode="text" maxlength="500"></textarea>
        <br>
        <label for="ImagemProblemaNosPneus" id="LabelImagemProblemaNosPneus">Anexar Foto do Problema (opcional):</label>
        <input type="file" name="ImagemProblemaNosPneus" id="ImagemProblemaNosPneus" accept="image/png, image/jpeg, image/webp">
        <br>
        <label for="CondicaoDaLataria"><h3>Condição Geral da Lataria:</h3></label>
        <textarea name="CondicaoDaLataria" id="CondicaoDaLataria" inputmode="text" required></textarea>
        <h3>RÁDIO COMUNICADOR</h3>
        <label for="EstadoRadioComunicadorBom">Marcar apenas uma Opção:</label>
        <br>
        <input type="radio" name="EstadoRadioComunicador" id="EstadoRadioComunicadorBom" value="Bom" required>
        <label for="EstadoRadioComunicadorBom">BOM</label>
        <br>
        <input type="radio" name="EstadoRadioComunicador" id="EstadoRadioComunicadorRuim" value="Ruim" required>
        <label for="EstadoRadioComunicadorRuim">RUIM</label>
        <br>
        <label for="ProblemaNoRadioComunicador"><h3 id="DescrevaProblemaNoRadioComunicador">Descreva o Problema no Rádio Comunicador:</h3></label>
        <textarea name="ProblemaNoRadioComunicador" id="ProblemaNoRadioComunicador" inputmode="text" maxlength="500"></textarea>
        <br>
        <label for="ImagemProblemaNoRadioComunicador" id="LabelImagemProblemaNoRadioComunicador">Anexar Foto do Problema (opcional):</label>
        <input type="file" name="ImagemProblemaNoRadioComunicador" id="ImagemProblemaNoRadioComunicador" accept="image/png, image/jpeg, image/webp">
        <br>
        <h3>SIRENE</h3>
        <label for="EstadoSireneBom">Marcar apenas uma Opção:</label>
        <br>
        <input type="radio" name="EstadoSirene" id="EstadoSireneBom" value="Bom" required>
        <label for="EstadoSireneBom">BOM</label>
        <br>
        <input type="radio" name="EstadoSirene" id="EstadoSireneRuim" value="Ruim" required>
        <label for="EstadoSireneRuim">RUIM</label>
        <br>
        <label for="ProblemaNaSirene"><h3 id="DescrevaProblemaNaSirene">Descreva o Problema na Sirene:</h3></label>
        <textarea name="ProblemaNaSirene" id="ProblemaNaSirene" inputmode="text" maxlength="500"></textarea>
        <br>
        <label for="ImagemProblemaNaSirene" id="LabelImagemProblemaNaSirene">Anexar Foto do Problema (opcional):</label>
        <input type="file" name="ImagemProblemaNaSirene" id="ImagemProblemaNaSirene" accept="image/png, image/jpeg, image/webp">
        <br>
        <h3>GIROFLEX</h3>
        <label for="EstadoGiroflexBom">Marcar apenas uma Opção:</label>
        <br>
        <input type="radio" name="EstadoGiroflex" id="EstadoGiroflexBom" value="Bom" required>
        <label for="EstadoGiroflexBom">BOM</label>
        <br>
        <input type="radio" name="EstadoGiroflex" id="EstadoGiroflexRuim" value="Ruim" required>
        <label for="EstadoGiroflexRuim">RUIM</label>
        <br>
        <label for="ProblemaNoGiroflex"><h3 id="DescrevaProblemaNoGiroflex">Descreva o Problema no Giroflex:</h3></label>
        <textarea name="ProblemaNoGiroflex" id="ProblemaNoGiroflex" inputmode="text" maxlength="500"></textarea>
        <br>
        <label for="ImagemProblemaNoGiroflex" id="LabelImagemProblemaNoGiroflex">Anexar Foto do Problema (opcional):</label>
        <input type="file" name="ImagemProblemaNoGiroflex" id="ImagemProblemaNoGiroflex" accept="image/png, image/jpeg, image/webp">
        <br>
        <label for="SaldoDeCombustivel"><h3>SALDO APROXIMADO DE COMBUSTÍVEL:</h3></label>
        <input type="text" name="SaldoDeCombustivel" id="SaldoDeCombustivel" pattern="[0-9]+" inputmode="numeric" title="Use Apenas Números" maxlength="255" required>
        <br>
        <label for="Observacoes"><h3>OBSERVAÇÕES:</h3></label>
        <textarea name="Observacoes" id="Observacoes" inputmode="text" placeholder="Opcional" maxlength="1000"></textarea>
        <button type="submit" name="btn1saida" id="btn1saida">Enviar Checklist</button>
        </details>
        </details>


    </form>

    <h1>CHECKLIST DE ENTRADA DE VIATURAS</h1>
    <hr>
    <form action="index.php" method="post" id="formEntrada" enctype="multipart/form-data">
    <input type="hidden" name="tipo" value="entrada">
        <details class="accordion3">
            <summary>Abrir Checklist De Entrada</summary>
        <label for="NomeDeGuerra2">Nome De Guerra:</label>
        <input type="text" name="NomeDeGuerra2" id="NomeDeGuerra2" inputmode="text" maxlength="500" required>
        <br>
        <label for="IdFunc2">ID FUNCIONÁRIO:</label>
        <input type="text" name="IdFunc2" id="IdFunc2" placeholder="Digite seu ID" pattern="[0-9]+" inputmode="numeric" title="Use apenas Números" maxlength="255" required>
        <br>
        <label for="Data2">DATA ATUAL:</label>
        <input type="date" name="Data2" id="Data2" required>
        <br>
        <label for="HorarioDeEntrada2">Horário de Entrada:</label>
        <input type="time" name="HorarioDeEntrada2" id="HorarioDeEntrada2" required>
        <br>
        <details class="accordion4">
            <summary>Mais</summary>
        <label for="PrefixoDeViatura2"><h3>PREFIXO DE VIATURA</h3></label>
        <input type="text" name="PrefixoDeViatura2" id="PrefixoDeViatura2" placeholder="Use Apenas Números" pattern="[0-9]+" inputmode="numeric" title="Use Apenas Números" maxlength="255" required>
        <br>
        <label for="KmAtual2"><h3>KM Atual:</h3></label>
        <input type="text" name="KmAtual2" id="KmAtual2" placeholder="Use Apenas Números" pattern="[0-9]+" inputmode="numeric" title="Use Apenas Números" maxlength="255" required>
        <br>
        <h3>LÍQUIDO DE ARREFECIMENTO</h3>
        <label for="LiquidoDeArrefecimentoBom2">Marcar Apenas uma Opção:</label>
        <br>
        <input type="radio" name="EstadoDoLiquidoDeArrefecimento2" id="LiquidoDeArrefecimentoBom2" value="Bom" required>
        <label for="LiquidoDeArrefecimentoBom2">BOM</label>
        <br>
        <input type="radio" name="EstadoDoLiquidoDeArrefecimento2" id="LiquidoDeArrefecimentoRuim2" value="Ruim">
        <label for="LiquidoDeArrefecimentoRuim2">RUIM</label>
        <br>
        <h3>NÍVEL DO ÓLEO</h3>
        <label for="NivelDoOleoBom2">Marcar Apenas uma Opção:</label>
        <br>
        <input type="radio" name="NivelDoOleo2" id="NivelDoOleoBom2" value="Bom" required>
        <label for="NivelDoOleoBom2">BOM</label>
        <br>
        <input type="radio" name="NivelDoOleo2" id="NivelDoOleoRuim2" value="Ruim" required>
        <label for="NivelDoOleoRuim2">RUIM</label>
        <br>
        <label for="KmTrocaDeOleo2"><h3>Kilometragem para Próxima Troca de Óleo:</h3></label>
        <input type="text" name="KmTrocaDeOleo2" id="KmTrocaDeOleo2" placeholder="Use Apenas Números" pattern="[0-9]+" inputmode="numeric" title="Use Apenas Números" maxlength="255" required>
        <h3>LUZES</h3>
        <label for="EstadoLuzesBom2">Marcar apenas uma Opção:</label>
        <br>
        <input type="radio" name="EstadoLuzes2" id="EstadoLuzesBom2" value="Bom" required>
        <label for="EstadoLuzesBom2">BOM</label>
        <br>
        <input type="radio" name="EstadoLuzes2" id="EstadoLuzesRuim2" value="Ruim" required>
        <label for="EstadoLuzesRuim2">RUIM</label>
        <br>
        <label for="ProblemaNasLuzes2"><h3 id="DescrevaProblemaNasLuzes2">Descreva o Problema nas Luzes:</h3></label>
        <textarea name="ProblemaNasLuzes2" id="ProblemaNasLuzes2" inputmode="text" maxlength="500" required></textarea>
        <br>
        <label for="ImagemProblemaNasLuzes2" id="LabelImagemProblemaNasLuzes2">Anexar Foto do Problema (opcional):</label>
        <input type="file" name="ImagemProblemaNasLuzes2" id="ImagemProblemaNasLuzes2" accept="image/png, image/jpeg, image/webp">
        <br>
        <h3>PNEUS</h3>
        <label for="EstadoPneusBom2">Marcar apenas uma Opção:</label>
        <br>
        <input type="radio" name="EstadoPneus2" id="EstadoPneusBom2" value="Bom" required>
        <label for="EstadoPneusBom2">BOM</label>
        <br>
        <input type="radio" name="EstadoPneus2" id="EstadoPneusRuim2" value="Ruim" required>
        <label for="EstadoPneusRuim2">RUIM</label>
        <br>
        <label for="ProblemaNosPneus2"><h3 id="DescrevaProblemaNosPneus2">Descreva o Problema nos Pneus:</h3></label>
        <textarea name="ProblemaNosPneus2" id="ProblemaNosPneus2" inputmode="text" maxlength="500" required></textarea>
        <br>
        <label for="ImagemProblemaNosPneus2" id="LabelImagemProblemaNosPneus2">Anexar Foto do Problema (opcional):</label>
        <input type="file" name="ImagemProblemaNosPneus2" id="ImagemProblemaNosPneus2" accept="image/png, image/jpeg, image/webp">
        <br>
        <label for="CondicaoDaLataria2"><h3>Condição Geral da Lataria:</h3></label>
        <textarea name="CondicaoDaLataria2" id="CondicaoDaLataria2" inputmode="text" maxlength="500" required></textarea>
        <h3>RÁDIO COMUNICADOR</h3>
        <label for="EstadoRadioComunicadorBom2">Marcar apenas uma Opção:</label>
        <br>
        <input type="radio" name="EstadoRadioComunicador2" id="EstadoRadioComunicadorBom2" value="Bom" required>
        <label for="EstadoRadioComunicadorBom2">BOM</label>
        <br>
        <input type="radio" name="EstadoRadioComunicador2" id="EstadoRadioComunicadorRuim2" value="Ruim" required>
        <label for="EstadoRadioComunicadorRuim2">RUIM</label>
        <label for="ProblemaNoRadioComunicador2"><h3 id="DescrevaProblemaNoRadioComunicador2">Descreva o Problema no Rádio Comunicador:</h3></label>
        <textarea name="ProblemaNoRadioComunicador2" id="ProblemaNoRadioComunicador2" inputmode="text" maxlength="500" required></textarea>
        <br>
        <label for="ImagemProblemaNoRadioComunicador2" id="LabelImagemProblemaNoRadioComunicador2">Anexar Foto do Problema (opcional):</label>
        <input type="file" name="ImagemProblemaNoRadioComunicador2" id="ImagemProblemaNoRadioComunicador2" accept="image/png, image/jpeg, image/webp">
        <br>
        <h3>SIRENE</h3>
        <label for="EstadoSireneBom2">Marcar apenas uma Opção:</label>
        <br>
        <input type="radio" name="EstadoSirene2" id="EstadoSireneBom2" value="Bom" required>
        <label for="EstadoSireneBom2">BOM</label>
        <br>
        <input type="radio" name="EstadoSirene2" id="EstadoSireneRuim2" value="Ruim" required>
        <label for="EstadoSireneRuim2">RUIM</label>
        <br>
        <label for="ProblemaNaSirene2"><h3 id="DescrevaProblemaNaSirene2">Descreva o Problema na Sirene:</h3></label>
        <textarea name="ProblemaNaSirene2" id="ProblemaNaSirene2" inputmode="text" maxlength="500" required></textarea>
        <br>
        <label for="ImagemProblemaNaSirene2" id="LabelImagemProblemaNaSirene2">Anexar Foto do Problema (opcional):</label>
        <input type="file" name="ImagemProblemaNaSirene2" id="ImagemProblemaNaSirene2" accept="image/png, image/jpeg, image/webp">
        <br>
        <h3>GIROFLEX</h3>
        <label for="EstadoGiroflexBom2">Marcar apenas uma Opção:</label>
        <br>
        <input type="radio" name="EstadoGiroflex2" id="EstadoGiroflexBom2" value="Bom" required>
        <label for="EstadoGiroflexBom2">BOM</label>
        <br>
        <input type="radio" name="EstadoGiroflex2" id="EstadoGiroflexRuim2" value="Ruim" required>
        <label for="EstadoGiroflexRuim2">RUIM</label>
        <br>
        <label for="ProblemaNoGiroflex2"><h3 id="DescrevaProblemaNoGiroflex2">Descreva o Problema no Giroflex:</h3></label>
        <textarea name="ProblemaNoGiroflex2" id="ProblemaNoGiroflex2" inputmode="text" maxlength="500" required></textarea>
        <br>
        <label for="ImagemProblemaNoGiroflex2" id="LabelImagemProblemaNoGiroflex2">Anexar Foto do Problema (opcional):</label>
        <input type="file" name="ImagemProblemaNoGiroflex2" id="ImagemProblemaNoGiroflex2" accept="image/png, image/jpeg, image/webp">
        <br>
        <label for="SaldoDeCombustivel2"><h3>SALDO APROXIMADO DE COMBUSTÍVEL:</h3></label>
        <input type="text" name="SaldoDeCombustivel2" id="SaldoDeCombustivel2" pattern="[0-9]+" inputmode="numeric" title="Use Apenas Números" maxlength="255" required>
        <br>
        <label for="Observacoes2"><h3>OBSERVAÇÕES:</h3></label>
        <textarea name="Observacoes2" id="Observacoes2" inputmode="text" placeholder="Opcional" maxlength="1000"></textarea>
        
        <button type="submit" name="btn2entrada" id="btn2entrada">Enviar Checklist</button>
        </details>
        </details>

    </form>
    <script src="script.js"></script>

<footer class="rodape-simples">
    <p>&copy; 2026 Copyright - E.E.E.M. BRIGADEIRO JOSÉ DA SILVA PAES</p>
    <h2 id="apoiode">APOIO DE:</h2>
    <img src="imagens/wdhouse_logo.png" alt="Wd House Logo" class="wdhouse" id="WdHouseLogo">
</footer>
</body>
</html>