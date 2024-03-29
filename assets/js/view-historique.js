document.addEventListener("DOMContentLoaded", function() {
  let popupConfirm = document.getElementById("popupConfirm");
  let btnCancel = document.getElementById("btn-cancel");
  let btnDelete = document.querySelectorAll(".btn-delete");
  let idTrajetInput = document.getElementById("id_trajet");

  btnDelete.forEach(function(button) {
      button.addEventListener("click", function () {
          let rowId = button.getAttribute("data-row-id");
          
          idTrajetInput.value = rowId;
          
          popupConfirm.style.display = "block";
          deleteText.innerHTML = "<b>Supprimer ce trajet ?</b> </br>" ;
          deleteText.innerHTML += `${button.getAttribute("data-row-distance")}</br>`;
          deleteText.innerHTML += `${button.getAttribute("data-row-date")}`;
      });
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
