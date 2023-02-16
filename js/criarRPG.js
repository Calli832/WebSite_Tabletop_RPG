let moldal = document.querySelector(".criarRPG");
let btnMoldal = document.querySelector(".btnMoldal");
let body = document.querySelector(".conteudo");
let criarRPG = document.querySelector(".criarRPG");
let nome = document.querySelector(".banner-info p");
let entrar = document.querySelector(".entrar");

window.onload = function () {
  moldal.classList.remove("oculto");
};

btnMoldal.addEventListener("click", () => {
  moldal.classList.add("oculto");
  body.classList.remove("oculto");
  criarRPG.style.display = "none";

  function mostrarNome() {
    let input = document.querySelector(".inputText").value;
    nome.innerHTML = input;
  }

  mostrarNome();
});

entrar.addEventListener("click", () => {
  window.location.href = "http://localhost/projeto/selecaoPersonagem.php";
});

// PEGAR DATA ATUAL
let data = new Date();
let dia = String(data.getDate()).padStart(2, "0");
let mes = String(data.getMonth() + 1).padStart(2, "0");
let ano = data.getFullYear();
dataAtual = dia + "/" + mes + "/" + ano;

const exibirData = document.querySelectorAll(".data");
for (const _data of exibirData) {
  _data.innerHTML = dataAtual;
}
