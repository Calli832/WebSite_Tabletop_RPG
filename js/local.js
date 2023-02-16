function salvarNickname(nome) {
  const nickname = JSON.stringify(nome);
  localStorage.setItem("nickname", nickname);
}
