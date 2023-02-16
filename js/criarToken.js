// UPLOAD IMAGEM DO TOKEN
const inputFile = document.querySelector("#picture_input");
const pictureImage = document.querySelector(".picture_image");
let preview = document.querySelector(".preview");

inputFile.addEventListener("change", function (e) {
  const inputTarget = e.target;
  const file = inputTarget.files[0];

  if (file) {
    const reader = new FileReader();

    reader.addEventListener("load", function (e) {
      const readerTarget = e.target;

      const img = readerTarget.result;
      preview.style = `background-image: url(${img})`;
    });

    reader.readAsDataURL(file);
  }
});
