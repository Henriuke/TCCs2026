let luzesBom = document.getElementById("EstadoLuzesBom");
let luzesRuim = document.getElementById("EstadoLuzesRuim");
let ProblemaLuzes = document.getElementById("ProblemaNasLuzes");
let DescrevaProblemaNasLuzes = document.getElementById("DescrevaProblemaNasLuzes");
let ImagemProblemaNasLuzes = document.getElementById("ImagemProblemaNasLuzes");
let LabelImagemProblemaNasLuzes = document.getElementById("LabelImagemProblemaNasLuzes");

ProblemaLuzes.style.display = 'none';
DescrevaProblemaNasLuzes.style.display = 'none';
ImagemProblemaNasLuzes.style.display = 'none';
LabelImagemProblemaNasLuzes.style.display = 'none';

function luzesProblemaAparecer() {
    if (luzesRuim.checked) {
        ProblemaLuzes.style.display = 'block';
        ProblemaLuzes.required = true;
        DescrevaProblemaNasLuzes.style.display = 'block';
        ImagemProblemaNasLuzes.style.display = 'block';
        LabelImagemProblemaNasLuzes.style.display = 'block';
    } else {
        ProblemaLuzes.style.display = 'none';
        ProblemaLuzes.value = "";
        ProblemaLuzes.required = false;
        DescrevaProblemaNasLuzes.style.display = 'none';
        ImagemProblemaNasLuzes.style.display = 'none';
        ImagemProblemaNasLuzes.value = "";
        LabelImagemProblemaNasLuzes.style.display = 'none';
    }
}
luzesBom.onclick = luzesProblemaAparecer;
luzesRuim.onclick = luzesProblemaAparecer;

let pneusBom = document.getElementById("EstadoPneusBom");
let pneusRuim = document.getElementById("EstadoPneusRuim");
let ProblemaPneus = document.getElementById("ProblemaNosPneus");
let DescrevaProblemaNosPneus = document.getElementById("DescrevaProblemaNosPneus");
let ImagemProblemaNosPneus = document.getElementById("ImagemProblemaNosPneus");
let LabelImagemProblemaNosPneus = document.getElementById("LabelImagemProblemaNosPneus");

ProblemaPneus.style.display = 'none';
DescrevaProblemaNosPneus.style.display = 'none';
ImagemProblemaNosPneus.style.display = 'none';
LabelImagemProblemaNosPneus.style.display = 'none';

function pneusProblemaAparecer() {
    if (pneusRuim.checked) {
        ProblemaPneus.style.display = 'block';
        ProblemaPneus.required = true;
        DescrevaProblemaNosPneus.style.display = 'block';
        ImagemProblemaNosPneus.style.display = 'block';
        LabelImagemProblemaNosPneus.style.display = 'block';
    } else {
        ProblemaPneus.style.display = 'none';
        ProblemaPneus.value = "";
        ProblemaPneus.required = false;
        DescrevaProblemaNosPneus.style.display = 'none';
        ImagemProblemaNosPneus.style.display = 'none';
        ImagemProblemaNosPneus.value = "";
        LabelImagemProblemaNosPneus.style.display = 'none';
    }
}
pneusBom.onclick = pneusProblemaAparecer;
pneusRuim.onclick = pneusProblemaAparecer;

let radioBom = document.getElementById("EstadoRadioComunicadorBom");
let radioRuim = document.getElementById("EstadoRadioComunicadorRuim");
let problemaRadioComunicador = document.getElementById("ProblemaNoRadioComunicador");
let descrevaProblemaNoRadioComunicador = document.getElementById("DescrevaProblemaNoRadioComunicador");
let imagemProblemaNoRadioComunicador = document.getElementById("ImagemProblemaNoRadioComunicador");
let labelImagemProblemaNoRadioComunicador = document.getElementById("LabelImagemProblemaNoRadioComunicador");

problemaRadioComunicador.style.display = 'none';
descrevaProblemaNoRadioComunicador.style.display = 'none';
imagemProblemaNoRadioComunicador.style.display = 'none';
labelImagemProblemaNoRadioComunicador.style.display = 'none';

function radioProblemaAparecer() {
    if (radioRuim.checked) {
        problemaRadioComunicador.style.display = 'block';
        problemaRadioComunicador.required = true;
        descrevaProblemaNoRadioComunicador.style.display = 'block';
        imagemProblemaNoRadioComunicador.style.display = 'block';
        labelImagemProblemaNoRadioComunicador.style.display = 'block';
    } else {
        problemaRadioComunicador.style.display = 'none';
        problemaRadioComunicador.value = "";
        problemaRadioComunicador.required = false;
        descrevaProblemaNoRadioComunicador.style.display = 'none';
        imagemProblemaNoRadioComunicador.style.display = 'none';
        imagemProblemaNoRadioComunicador.value = "";
        labelImagemProblemaNoRadioComunicador.style.display = 'none';
    }
}
radioRuim.onclick = radioProblemaAparecer;
radioBom.onclick = radioProblemaAparecer;

let sireneBom = document.getElementById("EstadoSireneBom");
let sireneRuim = document.getElementById("EstadoSireneRuim");
let problemaSirene = document.getElementById("ProblemaNaSirene");
let descrevaProblemaNaSirene = document.getElementById("DescrevaProblemaNaSirene");
let imagemProblemaNaSirene = document.getElementById("ImagemProblemaNaSirene");
let labelImagemProblemaNaSirene = document.getElementById("LabelImagemProblemaNaSirene");

problemaSirene.style.display = 'none';
descrevaProblemaNaSirene.style.display = 'none';
imagemProblemaNaSirene.style.display = 'none';
labelImagemProblemaNaSirene.style.display = 'none';

function sireneProblemaAparecer() {
    if (sireneRuim.checked) {
        problemaSirene.style.display = 'block';
        problemaSirene.required = true;
        descrevaProblemaNaSirene.style.display = 'block';
        imagemProblemaNaSirene.style.display = 'block';
        labelImagemProblemaNaSirene.style.display = 'block';
    } else {
        problemaSirene.style.display = 'none';
        problemaSirene.value = "";
        problemaSirene.required = false;
        descrevaProblemaNaSirene.style.display = 'none';
        imagemProblemaNaSirene.style.display = 'none';
        imagemProblemaNaSirene.value = "";
        labelImagemProblemaNaSirene.style.display = 'none';
    }
}
sireneRuim.onclick = sireneProblemaAparecer;
sireneBom.onclick = sireneProblemaAparecer;

let giroflexBom = document.getElementById("EstadoGiroflexBom");
let giroflexRuim = document.getElementById("EstadoGiroflexRuim");
let problemaGiroflex = document.getElementById("ProblemaNoGiroflex");
let descrevaProblemaNoGiroflex = document.getElementById("DescrevaProblemaNoGiroflex");
let imagemProblemaNoGiroflex = document.getElementById("ImagemProblemaNoGiroflex");
let labelImagemProblemaNoGiroflex = document.getElementById("LabelImagemProblemaNoGiroflex");

problemaGiroflex.style.display = 'none';
descrevaProblemaNoGiroflex.style.display = 'none';
imagemProblemaNoGiroflex.style.display = 'none';
labelImagemProblemaNoGiroflex.style.display = 'none';

function giroflexProblemaAparecer() {
    if (giroflexRuim.checked) {
        problemaGiroflex.style.display = 'block';
        descrevaProblemaNoGiroflex.style.display = 'block';
        problemaGiroflex.required = true;
        imagemProblemaNoGiroflex.style.display = 'block';
        labelImagemProblemaNoGiroflex.style.display = 'block';
    } else {
        problemaGiroflex.style.display = 'none';
        descrevaProblemaNoGiroflex.style.display = 'none';
        problemaGiroflex.required = false;
        problemaGiroflex.value = "";
        imagemProblemaNoGiroflex.style.display = 'none';
        imagemProblemaNoGiroflex.value = "";
        labelImagemProblemaNoGiroflex.style.display = 'none';
    }
}

giroflexBom.onclick = giroflexProblemaAparecer;
giroflexRuim.onclick = giroflexProblemaAparecer;


let luzesBom2 = document.getElementById("EstadoLuzesBom2");
let luzesRuim2 = document.getElementById("EstadoLuzesRuim2");
let ProblemaLuzes2 = document.getElementById("ProblemaNasLuzes2");
let DescrevaProblemaNasLuzes2 = document.getElementById("DescrevaProblemaNasLuzes2");
let ImagemProblemaNasLuzes2 = document.getElementById("ImagemProblemaNasLuzes2");
let LabelImagemProblemaNasLuzes2 = document.getElementById("LabelImagemProblemaNasLuzes2");

ProblemaLuzes2.style.display = 'none';
DescrevaProblemaNasLuzes2.style.display = 'none';
ImagemProblemaNasLuzes2.style.display = 'none';
LabelImagemProblemaNasLuzes2.style.display = 'none';

function luzesProblemaAparecer2() {
    if (luzesRuim2.checked) {
        ProblemaLuzes2.style.display = 'block';
        ProblemaLuzes2.required = true;
        DescrevaProblemaNasLuzes2.style.display = 'block';
        ImagemProblemaNasLuzes2.style.display = 'block';
        LabelImagemProblemaNasLuzes2.style.display = 'block';
    } else {
        ProblemaLuzes2.style.display = 'none';
        ProblemaLuzes2.value = "";
        ProblemaLuzes2.required = false;
        DescrevaProblemaNasLuzes2.style.display = 'none';
        ImagemProblemaNasLuzes2.style.display = 'none';
        ImagemProblemaNasLuzes2.value = "";
        LabelImagemProblemaNasLuzes2.style.display = 'none';
    }
}
luzesBom2.onclick = luzesProblemaAparecer2;
luzesRuim2.onclick = luzesProblemaAparecer2;

let pneusBom2 = document.getElementById("EstadoPneusBom2");
let pneusRuim2 = document.getElementById("EstadoPneusRuim2");
let ProblemaPneus2 = document.getElementById("ProblemaNosPneus2");
let DescrevaProblemaNosPneus2 = document.getElementById("DescrevaProblemaNosPneus2");
let ImagemProblemaNosPneus2 = document.getElementById("ImagemProblemaNosPneus2");
let LabelImagemProblemaNosPneus2 = document.getElementById("LabelImagemProblemaNosPneus2");

ProblemaPneus2.style.display = 'none';
DescrevaProblemaNosPneus2.style.display = 'none';
ImagemProblemaNosPneus2.style.display = 'none';
LabelImagemProblemaNosPneus2.style.display = 'none';

function pneusProblemaAparecer2() {
    if (pneusRuim2.checked) {
        ProblemaPneus2.style.display = 'block';
        ProblemaPneus2.required = true;
        DescrevaProblemaNosPneus2.style.display = 'block';
        ImagemProblemaNosPneus2.style.display = 'block';
        LabelImagemProblemaNosPneus2.style.display = 'block';
    } else {
        ProblemaPneus2.style.display = 'none';
        ProblemaPneus2.value = "";
        ProblemaPneus2.required = false;
        DescrevaProblemaNosPneus2.style.display = 'none';
        ImagemProblemaNosPneus2.style.display = 'none';
        ImagemProblemaNosPneus2.value = "";
        LabelImagemProblemaNosPneus2.style.display = 'none';
    }
}
pneusBom2.onclick = pneusProblemaAparecer2;
pneusRuim2.onclick = pneusProblemaAparecer2;

let radioBom2 = document.getElementById("EstadoRadioComunicadorBom2");
let radioRuim2 = document.getElementById("EstadoRadioComunicadorRuim2");
let problemaRadioComunicador2 = document.getElementById("ProblemaNoRadioComunicador2");
let descrevaProblemaNoRadioComunicador2 = document.getElementById("DescrevaProblemaNoRadioComunicador2");
let imagemProblemaNoRadioComunicador2 = document.getElementById("ImagemProblemaNoRadioComunicador2");
let labelImagemProblemaNoRadioComunicador2 = document.getElementById("LabelImagemProblemaNoRadioComunicador2");

problemaRadioComunicador2.style.display = 'none';
descrevaProblemaNoRadioComunicador2.style.display = 'none';
imagemProblemaNoRadioComunicador2.style.display = 'none';
labelImagemProblemaNoRadioComunicador2.style.display = 'none';

function radioProblemaAparecer2() {
    if (radioRuim2.checked) {
        problemaRadioComunicador2.style.display = 'block';
        problemaRadioComunicador2.required = true;
        descrevaProblemaNoRadioComunicador2.style.display = 'block';
        imagemProblemaNoRadioComunicador2.style.display = 'block';
        labelImagemProblemaNoRadioComunicador2.style.display = 'block';
    } else {
        problemaRadioComunicador2.style.display = 'none';
        problemaRadioComunicador2.value = "";
        problemaRadioComunicador2.required = false;
        descrevaProblemaNoRadioComunicador2.style.display = 'none';
        imagemProblemaNoRadioComunicador2.style.display = 'none';
        imagemProblemaNoRadioComunicador2.value = "";
        labelImagemProblemaNoRadioComunicador2.style.display = 'none';
    }
}
radioRuim2.onclick = radioProblemaAparecer2;
radioBom2.onclick = radioProblemaAparecer2;

let sireneBom2 = document.getElementById("EstadoSireneBom2");
let sireneRuim2 = document.getElementById("EstadoSireneRuim2");
let problemaSirene2 = document.getElementById("ProblemaNaSirene2");
let descrevaProblemaNaSirene2 = document.getElementById("DescrevaProblemaNaSirene2");
let imagemProblemaNaSirene2 = document.getElementById("ImagemProblemaNaSirene2");
let labelImagemProblemaNaSirene2 = document.getElementById("LabelImagemProblemaNaSirene2");

problemaSirene2.style.display = 'none';
descrevaProblemaNaSirene2.style.display = 'none';
imagemProblemaNaSirene2.style.display = 'none';
labelImagemProblemaNaSirene2.style.display = 'none';

function sireneProblemaAparecer2() {
    if (sireneRuim2.checked) {
        problemaSirene2.style.display = 'block';
        problemaSirene2.required = true;
        descrevaProblemaNaSirene2.style.display = 'block';
        imagemProblemaNaSirene2.style.display = 'block';
        labelImagemProblemaNaSirene2.style.display = 'block';
    } else {
        problemaSirene2.style.display = 'none';
        problemaSirene2.value = "";
        problemaSirene2.required = false;
        descrevaProblemaNaSirene2.style.display = 'none';
        imagemProblemaNaSirene2.style.display = 'none';
        imagemProblemaNaSirene2.value = "";
        labelImagemProblemaNaSirene2.style.display = 'none';
    }
}
sireneRuim2.onclick = sireneProblemaAparecer2;
sireneBom2.onclick = sireneProblemaAparecer2;

let giroflexBom2 = document.getElementById("EstadoGiroflexBom2");
let giroflexRuim2 = document.getElementById("EstadoGiroflexRuim2");
let problemaGiroflex2 = document.getElementById("ProblemaNoGiroflex2");
let descrevaProblemaNoGiroflex2 = document.getElementById("DescrevaProblemaNoGiroflex2");
let imagemProblemaNoGiroflex2 = document.getElementById("ImagemProblemaNoGiroflex2");
let labelImagemProblemaNoGiroflex2 = document.getElementById("LabelImagemProblemaNoGiroflex2");

problemaGiroflex2.style.display = 'none';
descrevaProblemaNoGiroflex2.style.display = 'none';
imagemProblemaNoGiroflex2.style.display = 'none';
labelImagemProblemaNoGiroflex2.style.display = 'none';

function giroflexProblemaAparecer2() {
    if (giroflexRuim2.checked) {
        problemaGiroflex2.style.display = 'block';
        descrevaProblemaNoGiroflex2.style.display = 'block';
        problemaGiroflex2.required = true;
        imagemProblemaNoGiroflex2.style.display = 'block';
        labelImagemProblemaNoGiroflex2.style.display = 'block';
    } else {
        problemaGiroflex2.style.display = 'none';
        descrevaProblemaNoGiroflex2.style.display = 'none';
        problemaGiroflex2.required = false;
        problemaGiroflex2.value = "";
        imagemProblemaNoGiroflex2.style.display = 'none';
        imagemProblemaNoGiroflex2.value = "";
        labelImagemProblemaNoGiroflex2.style.display = 'none';
    }
}

giroflexBom2.onclick = giroflexProblemaAparecer2;
giroflexRuim2.onclick = giroflexProblemaAparecer2;

class Menu {
    constructor(iconeMenu, navList, navLinks) {
        this.iconeMenu = document.querySelector(iconeMenu);
        this.navList = document.querySelector(navList);
        this.navLinks = document.querySelectorAll(navLinks);
        this.activeClass = "active";
    }

    animacaoLinks() {
        this.navLinks.forEach((link) => {
            link.style.animation ?
                (link.style.animation = "") :
                (link.style.animation = 'navLinkAparecer 0.5s ease forwards 0.3s')
        });
    }

    abrirMenu = () => {
        this.navList.classList.toggle(this.activeClass);
        this.iconeMenu.classList.toggle(this.activeClass);
        this.animacaoLinks();

    }
    aparecerMensagem() {
        if (this.iconeMenu) {
            this.iconeMenu.addEventListener("click", this.abrirMenu)
        }
    }
}
const menu = new Menu(
    ".icone-menu",
    ".nav-list",
    ".nav-list li"
);
menu.aparecerMensagem();

// FUNÇÃO DE ALERTA DE VIATURA
// 1. Cria a caixinha de alerta no canto da tela usando estilos diretos
function mostrarAlertaNoCanto(prefixo, listaDeProblemas) {
    // Se já tiver um alerta na tela, remove ele aFntes de criar o novo
    const alertaAntigo = document.getElementById('alerta');
    if (alertaAntigo) alertaAntigo.remove();

    // Cria a caixinha (div)
    const caixa = document.createElement('div');
    caixa.id = 'alerta';

    // Configura o visual da caixinha (Vermelha, flutuando no canto inferior direito)
    caixa.style.position = 'fixed';
    caixa.style.bottom = '20px';
    caixa.style.right = '20px';
    caixa.style.backgroundColor = '#d32f2f'; // Vermelho de atenção
    caixa.style.color = '#ffffff';
    caixa.style.padding = '20px';
    caixa.style.borderRadius = '8px';
    caixa.style.boxShadow = '0 4px 15px rgba(0,0,0,0.4)';
    caixa.style.zIndex = '9999';
    caixa.style.fontFamily = 'Arial, sans-serif';
    caixa.style.maxWidth = '360px';

    // Transforma a lista de problemas em linhas com pontinhos (•)
    let textoProblemas = listaDeProblemas.map(p => `• ${p}`).join('<br>');

    // Monta o conteúdo interno com um botão de fechar (X)
    caixa.innerHTML = `
        <div style="font-weight: bold; font-size: 16px; margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(255,255,255,0.3); padding-bottom: 5px;">
            ⚠️ ATENÇÃO: VIATURA ${prefixo}
            <span style="cursor: pointer; font-size: 18px; font-weight: bold; padding-left: 15px;" onclick="this.parentElement.parentElement.remove()">✕</span>
        </div>
        <div style="font-size: 14px; line-height: 1.5;">
            O relatório mais recente desta viatura acusa problemas em:<br>
            <div style="margin-top: 5px; font-weight: bold; color: #ffeb3b;">${textoProblemas}</div>
        </div>
    `;

    // Joga a caixinha dentro da página
    document.body.appendChild(caixa);
}

// 2. Faz a busca no PHP quando o usuário termina de digitar o prefixo
function checarHistoricoDaViatura(evento) {
    const prefixoDigitado = evento.target.value.trim();

    // Se o campo estiver vazio, não faz nada
    if (!prefixoDigitado) return;

    // Faz a chamada para o PHP passando o prefixo digitado
    fetch(`verificar_viatura.php?prefixo=${prefixoDigitado}`)
        .then(resposta => resposta.json())
        .then(dados => {
            if (dados.status === 'ruim') {
                // Se o PHP disser que está ruim, exibe o alerta na tela
                mostrarAlertaNoCanto(prefixoDigitado, dados.problemas);
            } else {
                // Se estiver tudo bem, remove qualquer alerta antigo que estivesse aberto
                const alerta = document.getElementById('alerta');
                if (alerta) alerta.remove();
            }
        })
        .catch(erro => console.log("Erro ao buscar histórico:", erro));
}

// 3. Monitora os dois campos de prefixo do seu formulário (Saída e Entrada)
const inputSaida = document.querySelector('input[name="PrefixoDeViatura"]');
const inputEntrada = document.querySelector('input[name="PrefixoDeViatura2"]');

// Quando o usuário sai do campo (evento 'blur'), a checagem roda automaticamente
if (inputSaida) inputSaida.addEventListener('blur', checarHistoricoDaViatura);
if (inputEntrada) inputEntrada.addEventListener('blur', checarHistoricoDaViatura);