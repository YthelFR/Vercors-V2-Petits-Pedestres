// Ajout d'une fonction pour vérifier si les pass sont pris en tarif réduit ou non.


export default function checkTarifReduit() {
  let reduction = document.querySelector("#tarifReduit");
  reduction.addEventListener("change", () => {
    if (reduction.checked == true) {
      console.log(reduction.checked);
      return reduction.checked;
    } else {
      console.log(reduction.checked);
      return reduction.checked;
    }
  });
}
