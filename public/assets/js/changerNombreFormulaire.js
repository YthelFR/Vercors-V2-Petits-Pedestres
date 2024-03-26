// Ajout d'un addEventListener avec les boutons ajoutés sur le nombre de places à réserver (pour rendre le côté plus intuitif pour l'utilisateur).

let btns = document.querySelectorAll(".btn");
let NombrePlaces = document.getElementById("NombrePlaces");

export default function changerNombreFormulaire() {
  btns.forEach((btns) => {
    btns.addEventListener("click", function () {
      if (btns.classList.contains("decrease")) {
        if (NombrePlaces.value == 0) {
          NombrePlaces.value == 0;
        } else {
          NombrePlaces.value--;
        }
      } else if (btns.classList.contains("increase")) {
        NombrePlaces.value++;
      }
    });
    return NombrePlaces.value;
  });

  let btnEnfants = document.querySelectorAll(".btnEnfants");
  let nombreCasquesEnfants = document.getElementById("nombreCasquesEnfants");
  btnEnfants.forEach((btnEnfants) => {
    btnEnfants.addEventListener("click", function () {
      if (btnEnfants.classList.contains("decreaseKids")) {
        if (nombreCasquesEnfants.value == 0) {
          nombreCasquesEnfants.value == 0;
        } else {
          nombreCasquesEnfants.value--;
        }
      } else if (btnEnfants.classList.contains("increaseKids")) {
        nombreCasquesEnfants.value++;
      }
    });
    return nombreCasquesEnfants.value;
  });

  let btnLuges = document.querySelectorAll(".btnLuges");
  let NombreLugesEte = document.getElementById("NombreLugesEte");
  btnLuges.forEach((btnLuges) => {
    btnLuges.addEventListener("click", function () {
      if (btnLuges.classList.contains("decreaseLuges")) {
        if (NombreLugesEte.value == 0) {
          NombreLugesEte.value == 0;
        } else {
          NombreLugesEte.value--;
        }
      } else if (btnLuges.classList.contains("increaseLuges")) {
        NombreLugesEte.value++;
      }
    });
    return NombreLugesEte.value;
  });
}
