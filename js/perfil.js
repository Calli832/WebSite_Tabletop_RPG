const formNickname = document.querySelector(".form-nickname");
const formEmail = document.querySelector(".form-email");
const formSenha = document.querySelector(".form-senha");

function escolha(opcao) {
  if (opcao === "nickname") {
    formEmail.classList.add("oculto");
    formSenha.classList.add("oculto");

    formNickname.classList.toggle("oculto");
  }
  if (opcao === "email") {
    formNickname.classList.add("oculto");
    formSenha.classList.add("oculto");

    formEmail.classList.toggle("oculto");
  }
  if (opcao === "senha") {
    formNickname.classList.add("oculto");
    formEmail.classList.add("oculto");

    formSenha.classList.toggle("oculto");
  }
}
