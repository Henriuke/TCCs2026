<?php 
 // Puxa a conexão centralizada configurada no db.php
 require_once 'db.php';

 // Faz as consultas usando o objeto $pdo do seu db.php
 $saidaQuery = $pdo->query("SELECT * FROM checklistdesaida ORDER BY id DESC");
 $entradaQuery = $pdo->query("SELECT * FROM checklistdeentrada ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios</title>
    <link rel="stylesheet" href="styles.css?v=2">
    <link rel="shortcut icon" href="imagens/LogoBrigada4K.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/pt.js"></script>

</head>
<body>
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

    <select class="relatiorio-select" id="relatorio-select">
        <option selected>Selecione o Relatório</option>
        <option value="1">Relatórios de Saída</option>
        <option value="2">Relatórios de Entrada</option>
    </select>

    <input type="text" id="calendario" placeholder="Selecione o período">

    <?php foreach($saidaQuery as $row): ?>
    <div class="card-relatorio card-saida" data-data="<?= $row['DataAtual'] ?>">
        <h2 id="relatorioSaida">Relatório de Saída</h2>
        <p><strong>Nome de Guerra:</strong> <?= $row['NomeDeGuerra'] ?></p>
        <p><strong>Id do Funcionário:</strong> <?= $row['idFuncionario'] ?></p>
        <p><strong>Data:</strong> <?= date('d/m/Y', strtotime($row['DataAtual'])) ?></p>
        <p><strong>Horário de Saída:</strong> <?= $row['HorarioDeSaida'] ?></p>
        <p><strong>Missão:</strong> <?= $row['Missao'] ?></p>
        <p><strong>Prefixo da Viatura:</strong> <?= $row['PrefixoDaViatura'] ?></p>
        <p><strong>Km Atual:</strong> <?= $row['KMatual'] ?></p>
        <p><strong>Líquido de Arrefecimento:</strong> <?= $row['LiquidoDeArrefecimento'] ?></p>
        <p><strong>Nível do Óleo:</strong> <?= $row['NivelDoOleo'] ?></p>
        <p><strong>Km Troca de Óleo:</strong> <?= $row['KilometragemParaProximaTrocadeOleo'] ?></p>
        <p><strong>Estado das Luzes:</strong> <?= $row['EstadoDeLuzes'] ?></p>
        <p><strong>Problema nas Luzes:</strong> <?= $row['ProblemaNasLuzes'] ?: 'Nenhum' ?>
            <?php if (!empty($row['ImagemLuzes'])): ?>
                <a class="btn-baixar-imagem" href="uploads_problemas/<?= htmlspecialchars($row['ImagemLuzes']) ?>" download target="_blank">Baixar Imagem</a>
            <?php endif; ?>
        </p>
        <p><strong>Estado dos Pneus:</strong> <?= $row['EstadoDosPneus'] ?></p>
        <p><strong>Problema nos Pneus:</strong> <?= $row['ProblemaNosPneus'] ?: 'Nenhum' ?>
            <?php if (!empty($row['ImagemPneus'])): ?>
                <a class="btn-baixar-imagem" href="uploads_problemas/<?= htmlspecialchars($row['ImagemPneus']) ?>" download target="_blank">Baixar Imagem</a>
            <?php endif; ?>
        </p>
        <p><strong>Condição da Lataria:</strong> <?= $row['CondicaoGeraldaLataria'] ?></p>
        <p><strong>Estado do Rádio:</strong> <?= $row['EstadoDoRadioComunicador'] ?></p>
        <p><strong>Problema no Rádio:</strong> <?= $row['ProblemaNoRadioComunicador'] ?: 'Nenhum' ?>
            <?php if (!empty($row['ImagemRadio'])): ?>
                <a class="btn-baixar-imagem" href="uploads_problemas/<?= htmlspecialchars($row['ImagemRadio']) ?>" download target="_blank">Baixar Imagem</a>
            <?php endif; ?>
        </p>
        <p><strong>Estado da Sirene:</strong> <?= $row['EstadoDaSirene'] ?></p>
        <p><strong>Problema na Sirene:</strong> <?= $row['ProblemaNaSirene'] ?: 'Nenhum' ?>
            <?php if (!empty($row['ImagemSirene'])): ?>
                <a class="btn-baixar-imagem" href="uploads_problemas/<?= htmlspecialchars($row['ImagemSirene']) ?>" download target="_blank">Baixar Imagem</a>
            <?php endif; ?>
        </p>
        <p><strong>Estado do Giroflex:</strong> <?= $row['EstadoDoGiroflex'] ?></p>
        <p><strong>Problema no Giroflex:</strong> <?= $row['ProblemaNoGiroflex'] ?: 'Nenhum' ?>
            <?php if (!empty($row['ImagemGiroflex'])): ?>
                <a class="btn-baixar-imagem" href="uploads_problemas/<?= htmlspecialchars($row['ImagemGiroflex']) ?>" download target="_blank">Baixar Imagem</a>
            <?php endif; ?>
        </p>
        <p><strong>Saldo Aproximado de Combustível:</strong> <?= $row['Saldoaproximadodecombustivel'] ?></p>
        <p><strong>Observações:</strong> <?= $row['observacoes'] ?: 'Nenhuma' ?></p>
        <button onclick="baixarPDF(this)">Baixar em PDF</button>
    </div>
    <hr class="hr-saida" data-data="<?= $row['DataAtual'] ?>">
    <?php endforeach; ?>


    <?php foreach($entradaQuery as $row): ?>
    <div class="card-relatorio card-entrada" data-data="<?= $row['DataAtual2'] ?>">
    <h2 id="relatorioEntrada">Relatório de Entrada</h2>
        <p><strong>Nome de Guerra:</strong> <?= $row['NomeDeGuerra2'] ?></p>
        <p><strong>Id do Funcionário:</strong> <?= $row['idFuncionario2'] ?></p>
        <p><strong>Data:</strong> <?= date('d/m/Y', strtotime($row['DataAtual2'])) ?></p>
        <p><strong>Horário de Entrada:</strong> <?= $row['HorarioDeEntrada'] ?></p>
        <p><strong>Prefixo da Viatura:</strong> <?= $row['PrefixoDaViatura2'] ?></p>
        <p><strong>Km Atual:</strong> <?= $row['KMatual2'] ?></p>
        <p><strong>Líquido de Arrefecimento:</strong> <?= $row['LiquidoDeArrefecimento2'] ?></p>
        <p><strong>Nível do Óleo:</strong> <?= $row['NivelDoOleo2'] ?></p>
        <p><strong>Km Troca de Óleo:</strong> <?= $row['KilometragemParaProximaTrocadeOleo2'] ?></p>
        <p><strong>Estado das Luzes:</strong> <?= $row['EstadoDeLuzes2'] ?></p>
        <p><strong>Problema nas Luzes:</strong> <?= $row['ProblemaNasLuzes2'] ?: 'Nenhum' ?>
            <?php if (!empty($row['ImagemLuzes2'])): ?>
                <a class="btn-baixar-imagem" href="uploads_problemas/<?= htmlspecialchars($row['ImagemLuzes2']) ?>" download target="_blank">Baixar Imagem</a>
            <?php endif; ?>
        </p>
        <p><strong>Estado dos Pneus:</strong> <?= $row['EstadoDosPneus2'] ?></p>
        <p><strong>Problema nos Pneus:</strong> <?= $row['ProblemaNosPneus2'] ?: 'Nenhum' ?>
            <?php if (!empty($row['ImagemPneus2'])): ?>
                <a class="btn-baixar-imagem" href="uploads_problemas/<?= htmlspecialchars($row['ImagemPneus2']) ?>" download target="_blank">Baixar Imagem</a>
            <?php endif; ?>
        </p>
        <p><strong>Condição da Lataria:</strong> <?= $row['CondicaoGeraldaLataria2'] ?></p>
        <p><strong>Estado do Rádio:</strong> <?= $row['EstadoDoRadioComunicador2'] ?></p>
        <p><strong>Problema no Rádio:</strong> <?= $row['ProblemaNoRadioComunicador2'] ?: 'Nenhum' ?>
            <?php if (!empty($row['ImagemRadio2'])): ?>
                <a class="btn-baixar-imagem" href="uploads_problemas/<?= htmlspecialchars($row['ImagemRadio2']) ?>" download target="_blank">Baixar Imagem</a>
            <?php endif; ?>
        </p>
        <p><strong>Estado da Sirene:</strong> <?= $row['EstadoDaSirene2'] ?></p>
        <p><strong>Problema na Sirene:</strong> <?= $row['ProblemaNaSirene2'] ?: 'Nenhum' ?>
            <?php if (!empty($row['ImagemSirene2'])): ?>
                <a class="btn-baixar-imagem" href="uploads_problemas/<?= htmlspecialchars($row['ImagemSirene2']) ?>" download target="_blank">Baixar Imagem</a>
            <?php endif; ?>
        </p>
        <p><strong>Estado do Giroflex:</strong> <?= $row['EstadoDoGiroflex2'] ?></p>
        <p><strong>Problema no Giroflex:</strong> <?= $row['ProblemaNoGiroflex2'] ?: 'Nenhum' ?>
            <?php if (!empty($row['ImagemGiroflex2'])): ?>
                <a class="btn-baixar-imagem" href="uploads_problemas/<?= htmlspecialchars($row['ImagemGiroflex2']) ?>" download target="_blank">Baixar Imagem</a>
            <?php endif; ?>
        </p>
        <p><strong>Saldo Aproximado de Combustível:</strong> <?= $row['Saldoaproximadodecombustivel2'] ?></p>
        <p><strong>Observações:</strong> <?= $row['observacoes2'] ?: 'Nenhuma' ?></p>
        <button onclick="baixarPDF(this)">Baixar em PDF</button>
    </div>
    <hr class="hr-entrada" data-data="<?= $row['DataAtual2'] ?>">
    <?php endforeach; ?>

    <script>
    const selecionarRelatorio = document.getElementById("relatorio-select");
    const cardsSaida   = document.querySelectorAll(".card-saida");
    const cardsEntrada = document.querySelectorAll(".card-entrada");
    const hrsSaida   = document.querySelectorAll(".hr-saida");
    const hrsEntrada = document.querySelectorAll(".hr-entrada");

    cardsSaida.forEach(c => c.style.display = "none");
    cardsEntrada.forEach(c => c.style.display = "none");
    hrsSaida.forEach(h => h.style.display = "none");
    hrsEntrada.forEach(h => h.style.display = "none");

    selecionarRelatorio.addEventListener("change", function() {
        if (this.value === "1") {
            cardsSaida.forEach(c => c.style.display = "block");
            cardsEntrada.forEach(c => c.style.display = "none");
            hrsSaida.forEach(h => h.style.display = "block");
            hrsEntrada.forEach(h => h.style.display = "none");

        } else if (this.value === "2") {
            cardsSaida.forEach(c => c.style.display = "none");
            cardsEntrada.forEach(c => c.style.display = "block");
            hrsSaida.forEach(h => h.style.display = "none");
            hrsEntrada.forEach(h => h.style.display = "block");
        }
    });

        function baixarPDF(botao){
    const card = botao.closest(".card-relatorio");
    const titulo = card.querySelector("h2").textContent;
    const paragrafos = card.querySelectorAll("p");

    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    const img = new Image();
    img.src = 'imagens/LogoBrigada4K.png';

    img.onload = function() {
        const larguraPagina = doc.internal.pageSize.getWidth();
        const alturaPagina = doc.internal.pageSize.getHeight();

        // Função interna para desenhar o layout visual da página (Marca d'água e Rodapé)
        function aplicarLayoutPagina(ePrimeiraPagina = false) {
            // 1. Marca d'água de fundo (com opacidade controlada)
            doc.setGState(new doc.GState({opacity: 0.12}));
            doc.addImage(img, 'JPEG', 45, 80, 120, 120); 
            doc.setGState(new doc.GState({opacity: 1.0}));

            // 2. Linha decorativa acima do rodapé
            doc.setDrawColor(200, 168, 75); // Cor dourada fina
            doc.setLineWidth(0.3);
            doc.line(10, alturaPagina - 15, larguraPagina - 10, alturaPagina - 15);

            // 3. Título Principal (Apenas inserido no topo da primeira página)
            if (ePrimeiraPagina) {
                doc.setFont("Helvetica", "bold");
                doc.setFontSize(16);
                doc.setTextColor(10, 31, 13); // Tom verde escuro institucional para o título
                doc.text(titulo, larguraPagina / 2, 20, { align: "center" });
            }
        }

        // Inicializa a primeira página com o layout completo
        aplicarLayoutPagina(true);
        
        // Configuração do texto dos relatórios
        doc.setFont("Helvetica", "normal");
        doc.setFontSize(10.5);
        doc.setTextColor(40, 40, 40); // Cor cinza escura ideal para leitura em papel branco
        
        let posicaoY = 32; // Posição vertical inicial (abaixo do título)
        const limiteInferior = alturaPagina - 22; // Limite seguro antes de trombar no rodapé
        const alturaLinha = 5.2; // Espaçamento vertical compacto e preciso por linha de texto

        paragrafos.forEach(function(p) {
            // Pega o texto do parágrafo sem incluir o botão de baixar imagem
            const clone = p.cloneNode(true);
            clone.querySelectorAll('.btn-baixar-imagem').forEach(el => el.remove());
            const textoParagrafo = clone.textContent.trim();

            // Divide o parágrafo em linhas menores baseando-se na largura máxima útil (190mm)
            const linhasTexto = doc.splitTextToSize(textoParagrafo, 190);
            
            linhasTexto.forEach(function(linha) {
                // Se a próxima linha for ultrapassar o limite da página, cria outra eletronicamente
                if (posicaoY > limiteInferior) {
                    doc.addPage();
                    aplicarLayoutPagina(false); // Aplica o fundo/rodapé na página 2 (sem repetir o título)
                    
                    // Reconfigura a fonte para a nova folha
                    doc.setFont("Helvetica", "normal");
                    doc.setFontSize(10.5);
                    doc.setTextColor(40, 40, 40);
                    posicaoY = 20; // Reseta o cursor para o topo da nova página
                }
                
                doc.text(linha, 10, posicaoY);
                posicaoY += alturaLinha;
            });
            
            posicaoY += 1.5; // Pequeno respiro entre blocos de informações diferentes
        });

        // Salva o documento formatado
        doc.save(titulo + " - " + new Date().toLocaleDateString().replace(/\//g, '-') + ".pdf");
    };
}
    </script>

    <script>
    class Menu{
        constructor(iconeMenu, navList, navLinks) {
            this.iconeMenu = document.querySelector(iconeMenu);
            this.navList = document.querySelector(navList);
            this.navLinks = document.querySelectorAll(navLinks);
            this.activeClass = "active";
        }

        animacaoLinks(){
            this.navLinks.forEach((link) => {
                link.style.animation
                ? (link.style.animation = "")
                : (link.style.animation = 'navLinkAparecer 0.5s ease forwards 0.3s')
            });
        }

        abrirMenu = () => {
            this.navList.classList.toggle(this.activeClass);
            this.iconeMenu.classList.toggle(this.activeClass);
            this.animacaoLinks();
        }

        aparecerMensagem(){
            if(this.iconeMenu){
                this.iconeMenu.addEventListener("click", this.abrirMenu)
            }
        }
    }

    const menu = new Menu(".icone-menu", ".nav-list", ".nav-list li");
    menu.aparecerMensagem();

    flatpickr("#calendario", {
    mode: "range",
    dateFormat: "Y-m-d",
    locale: "pt",
    onClose: function(datas) {
        const inicio = datas[0].toISOString().substring(0, 10);
        const fim    = datas[1].toISOString().substring(0, 10);

        document.querySelectorAll('.card-saida, .hr-saida').forEach(function(el) {
            const dataEl = el.getAttribute('data-data');
            el.style.display = (dataEl >= inicio && dataEl <= fim) ? 'block' : 'none';
        });

        document.querySelectorAll('.card-entrada, .hr-entrada').forEach(function(el) {
            const dataEl = el.getAttribute('data-data');
            el.style.display = (dataEl >= inicio && dataEl <= fim) ? 'block' : 'none';
        });
        }
    });
    </script>
 
    <script src="script.js"></script>
      <style>
    .rodape-simples {
        background-color: #0a1f0d; /* Verde escuro do sistema */
        color: #c8d5cb; /* Branco suave */
        text-align: center;
        padding: 20px;
        margin-top: 50px;
        border-top: 2px solid #c8a84b; /* Linha dourada do sistema */
        width: 100%;
        font-family: 'Inter', sans-serif;
        font-size: 0.9rem;
    }
</style>

<footer class="rodape-simples">
    <p>&copy; 2026 Copyright - E.E.E.M. BRIGADEIRO JOSÉ DA SILVA PAES</p>
    <img src="imagens/wdhouse_logo.png" alt="Wd House Logo" class="wdhouse" id="WdHouseLogo">
</footer>
</body>
</html>