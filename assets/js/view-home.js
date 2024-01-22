window.onload = () => {
    let popup = document.querySelector(".popup");
    popup.style.display = "block";
  };
  // Fermeture du popup quand on clique sur la croix :D
  let closeBtn = document.querySelector(".close-btn");
  closeBtn.addEventListener("click", function () {
    let popup = document.querySelector(".popup");
    popup.style.display = "none";
  });
  