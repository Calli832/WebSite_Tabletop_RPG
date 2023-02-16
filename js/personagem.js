let nomePersonagem = "";

function salvarPersonagem(nome) {
  const personagem = JSON.stringify(nome);
  localStorage.setItem("personagem", personagem);
}
