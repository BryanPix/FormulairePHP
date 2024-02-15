document.addEventListener("DOMContentLoaded", function() {
  let popupConfirm = document.getElementById("popupConfirm");
  let btnCancel = document.getElementById("btn-cancel");
  let btnDelete = document.querySelector(".btn-delete");

  btnDelete.addEventListener("click", function () {
          popupConfirm.style.display = "block";
          deleteText.innerHTML = "<b>Supprimer ce compte ? Cette action est irréversible !</b> </br>" ;
  });
  btnCancel.addEventListener("click", function () {
      popupConfirm.style.display = "none";
  });
  window.onclick = function (event) {
    if (event.target == popupConfirm) {
      popupConfirm.style.display = "none";
    }
  }; 
});


let divModifier = document.querySelector(".divModifier");
let btnModifier = document.getElementById("btn-modifier");

btnModifier.addEventListener("click", function(){
    divModifier.classList.toggle("divModifier");
});

function showPreview(event){
    if(event.target.files.length > 0){
      let src = URL.createObjectURL(event.target.files[0]);
      let preview = document.getElementById("file-ip-1-preview");
      preview.src = src;
      preview.style.display = "block";
    }
  }
