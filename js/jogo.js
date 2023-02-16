// MOVIMENTAÇÃO PERSONAGEM
let x = 0;
let y = 0;

window.addEventListener("keydown", function (event) {
  var tecla = event.keyCode;
  if (tecla == "39") {
    x += 10;
    document.getElementById("player").style.left = x + "px";
  }
  if (tecla == "37") {
    x -= 10;
    document.getElementById("player").style.left = x + "px";
  }
  if (tecla == "38") {
    y -= 10;
    document.getElementById("player").style.top = y + "px";
  }
  if (tecla == "40") {
    y += 10;
    document.getElementById("player").style.top = y + "px";
  }
});

// ABRIR/FECHAR O CHAT

const btnChat = document.querySelector("#btnChat");
const chat = document.querySelector("#chat");

function showHiddenChat(event) {
  chat.classList.toggle("oculto");
}

btnChat.addEventListener("click", showHiddenChat);

// DIGITAR NO CHAT
const btnEnviar = document.querySelector("#enviar");
const texto = document.querySelector("#texto");
const mensagem = document.querySelector("#output");
btnEnviar.addEventListener("click", adicionaChat);

let nomeDoPersonagem = JSON.parse(localStorage.getItem("personagem"));

function adicionaChat() {
  if (texto.value != "") {
    let p = document.createElement("p");
    p.innerHTML = `${nomeDoPersonagem}: ${texto.value}`;
    p.classList.add("item");
    mensagem.append(p);
    texto.value = "";
    texto.focus();
  }
}

texto.addEventListener("keyup", function (e) {
  if (e.keyCode === 13 && texto.value != "") {
    adicionaChat();
  }
});

// ABRIR/FECHAR ESCOLHA DE DADOS

let btnDado = document.getElementById("btnDado");
let menuDados = document.getElementById("menuDados");

btnDado.addEventListener("click", () => {
  menuDados.classList.toggle("oculto");
});

// RODAR O DADO == D20

const buttonD20 = document.getElementById("d20");

const div = document.getElementById("output");

function drawD20() {
  let num = (Math.random() * 20).toFixed(0);
  return num;
}

function insertNumberDrawn() {
  const p = document.createElement("p");

  let numberDraw = drawD20();

  if (numberDraw == 20) {
    p.style = "color: green";
  }

  p.innerHTML = `${nomeDoPersonagem}: Número sorteado(D20) => ${numberDraw}`;
  p.classList.add("item");

  output.append(p);
}

d20.addEventListener("click", insertNumberDrawn);

// RODAR O DADO == D12

const buttonD12 = document.getElementById("d12");

function drawD12() {
  let num = (Math.random() * 12).toFixed(0);
  return num;
}

function insertNumberDrawnD12() {
  const p = document.createElement("p");

  let numberDraw = drawD12();

  if (numberDraw == 12) {
    p.style = "color: green";
  }

  p.innerHTML = `${nomeDoPersonagem}: Número sorteado(D12) => ${numberDraw}`;
  p.classList.add("item");

  output.append(p);
}

d12.addEventListener("click", insertNumberDrawnD12);

// RODAR O DADO == D8

const buttonD8 = document.getElementById("d8");

function drawD8() {
  let num = (Math.random() * 8).toFixed(0);
  return num;
}

function insertNumberDrawnD8() {
  const p = document.createElement("p");

  let numberDraw = drawD8();

  if (numberDraw == 8) {
    p.style = "color: green";
  }

  p.innerHTML = `${nomeDoPersonagem}: Número sorteado(D8) => ${numberDraw}`;
  p.classList.add("item");

  output.append(p);
}

d8.addEventListener("click", insertNumberDrawnD8);

// RODAR O DADO == D8

const buttonD6 = document.getElementById("d8");

function drawD6() {
  let num = (Math.random() * 6).toFixed(0);
  return num;
}

function insertNumberDrawnD6() {
  const p = document.createElement("p");

  let numberDraw = drawD6();

  if (numberDraw == 6) {
    p.style = "color: green";
  }

  p.innerHTML = `${nomeDoPersonagem}: Número sorteado(D6) => ${numberDraw}`;
  p.classList.add("item");

  output.append(p);
}

d6.addEventListener("click", insertNumberDrawnD6);

// RODAR O DADO == D8

const buttonD4 = document.getElementById("d8");

function draw() {
  let num = (Math.random() * 4).toFixed(0);
  return num;
}

function insertNumberDrawnD4() {
  const p = document.createElement("p");

  let numberDraw = draw();

  if (numberDraw == 4) {
    p.style = "color: green";
  }

  p.innerHTML = `${nomeDoPersonagem}: Número sorteado(D4) => ${numberDraw}`;
  p.classList.add("item");

  output.append(p);
}

d4.addEventListener("click", insertNumberDrawnD4);

// FUNDO DINAMICO
const btnMapa = document.querySelector("#trocaMapa");
let fundo = document.querySelector(".areaJogo");

btnMapa.addEventListener("click", toggleModal);

const modal = document.querySelector(".modal-mapas");

function toggleModal() {
  modal.classList.toggle("oculto");
}

function trocaFundo(fundoUrl) {
  fundo.style = `background-image: url(${fundoUrl})`;
}

function exibirHabilidade(habilidade) {
  let hab = "";
  let tipo = "";
  let dado = 0;
  let danoAdicional = 0;

  if (habilidade === "h1") {
    if (nomeDoPersonagem == "Radulfr") {
      hab = "Yrdenn";
      dado = 12;
    } else if (nomeDoPersonagem == "Thuridan") {
      hab = "Meteoros";
      dado = 64;
    } else if (nomeDoPersonagem == "Estel") {
      hab = "Arco";
      dado = 12;
      danoAdicional = 5;
    } else if (nomeDoPersonagem == "Spec") {
      hab = "Espada";
      dado = 12;
      danoAdicional = 4;
    } else if (nomeDoPersonagem == "Azok") {
      hab = "Fúria";
      tipo = "texto";
    } else if (nomeDoPersonagem == "Allana") {
      hab = "Cura";
      dado = 12;
      tipo = "cura";
    } else {
      hab = "Espada";
      dado = 12;
      danoAdicional = 5;
    }
  }

  if (habilidade === "h2") {
    if (nomeDoPersonagem == "Radulfr") {
      hab = "Quen";
      tipo = "texto";
    } else if (nomeDoPersonagem == "Thuridan") {
      hab = "Aenye";
      dado = 24;
    } else if (nomeDoPersonagem == "Estel") {
      hab = "Sneak Attack";
      dado = 18;
    } else if (nomeDoPersonagem == "Spec") {
      hab = "Sneak Attack";
      dado = 18;
    } else if (nomeDoPersonagem == "Azok") {
      hab = "Tank Absoluto";
      tipo = "texto";
    } else if (nomeDoPersonagem == "Allana") {
      hab = "Sufocar da Vara";
      dado = 20;
    } else {
      hab = "Dark Hold";
      tipo = "texto";
    }
  }

  if (habilidade === "h3") {
    if (nomeDoPersonagem == "Radulfr") {
      hab = "Axii";
      tipo = "texto";
    } else if (nomeDoPersonagem == "Thuridan") {
      hab = "Pico de Barro";
      dado = 48;
    } else if (nomeDoPersonagem == "Estel") {
      hab = "Camuflagem";
      tipo = "texto";
    } else if (nomeDoPersonagem == "Spec") {
      hab = "Raio Elétrico Supremo";
      dado = 420;
    } else if (nomeDoPersonagem == "Azok") {
      hab = "Meginginir";
      dado = 12;
      danoAdicional = 11;
    } else if (nomeDoPersonagem == "Allana") {
      hab = "Gift";
      tipo = "texto";
    } else {
      hab = "o poder da cachaça!";
      tipo = "texto";
    }
  }

  let p = document.createElement("p");

  if (tipo == "texto") {
    p.innerHTML = `${nomeDoPersonagem}: Ativou ${hab}.`;
    p.classList.add("item");
    mensagem.append(p);
  } else if (tipo == "cura") {
    let random = parseInt(Math.random() * dado);
    p.innerHTML = `${nomeDoPersonagem}: Ativou ${hab} e curou ${random} de vida.`;
    p.classList.add("item");
    mensagem.append(p);
  } else {
    let random = parseInt(Math.random() * dado + danoAdicional);
    p.innerHTML = `${nomeDoPersonagem}: usou ${hab} e causou ${random} de dano.`;
    p.classList.add("item");
    mensagem.append(p);
  }
}

// UPLOAD DE MAPA
const inputFile = document.querySelector("#picture_input");
const pictureImage = document.querySelector(".picture_image");

inputFile.addEventListener("change", function (e) {
  const inputTarget = e.target;
  const file = inputTarget.files[0];

  if (file) {
    const reader = new FileReader();

    reader.addEventListener("load", function (e) {
      const readerTarget = e.target;

      const img = readerTarget.result;
      fundo.style = `background-image: url(${img})`;
    });

    reader.readAsDataURL(file);
  }
});

// FICHA DO JOGADOR
const btnFicha = document.querySelector("#ficha");
const ficha = document.querySelector(".ficha-player");

btnFicha.addEventListener("click", () => {
  ficha.classList.toggle("oculto");
});

// VALORES DINAMICOS NA FICHA DO JOGADOR
let inputForca = document.querySelector(".forca");
let inputDestreza = document.querySelector(".destreza");
let inputConstituicao = document.querySelector(".constituicao");
let inputInteligencia = document.querySelector(".inteligencia");
let inputSabedoria = document.querySelector(".sabedoria");
let inputCarisma = document.querySelector(".carisma");

const personagens = [
  {
    id: 1,
    nome: "Radulfr",
    forca: "20",
    destreza: "16",
    constituicao: "16",
    inteligencia: "22",
    sabedoria: "14",
    carisma: "24",
  },
  {
    id: 2,
    nome: "Estel",
    forca: "20",
    destreza: "24",
    constituicao: "14",
    inteligencia: "14",
    sabedoria: "22",
    carisma: "16",
  },
  {
    id: 3,
    nome: "Azok",
    forca: "22",
    destreza: "14",
    constituicao: "24",
    inteligencia: "14",
    sabedoria: "14",
    carisma: "18",
  },
  {
    id: 4,
    nome: "Allana",
    forca: "12",
    destreza: "16",
    constituicao: "14",
    inteligencia: "22",
    sabedoria: "24",
    carisma: "20",
  },
  {
    id: 5,
    nome: "Thuridan",
    forca: "10",
    destreza: "12",
    constituicao: "22",
    inteligencia: "24",
    sabedoria: "24",
    carisma: "16",
  },
  {
    id: 6,
    nome: "Spec",
    forca: "20",
    destreza: "24",
    constituicao: "16",
    inteligencia: "18",
    sabedoria: "14",
    carisma: "22",
  },
];

personagemSelecionado = personagens.find(
  (personagem) => personagem.nome === nomeDoPersonagem
);

if (personagemSelecionado) {
  inputForca.value = personagemSelecionado.forca;
  inputDestreza.value = personagemSelecionado.destreza;
  inputConstituicao.value = personagemSelecionado.constituicao;
  inputInteligencia.value = personagemSelecionado.inteligencia;
  inputSabedoria.value = personagemSelecionado.sabedoria;
  inputCarisma.value = personagemSelecionado.carisma;
}
