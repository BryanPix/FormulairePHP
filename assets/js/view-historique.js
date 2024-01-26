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
      });
  });

  btnCancel.addEventListener("click", function () {
      popupConfirm.style.display = "none";
      console.log("Refuser");
  });

  window.onclick = function (event) {
    if (event.target == popupConfirm) {
      popupConfirm.style.display = "none";
      console.log("non choisi");
    }
  };
});
