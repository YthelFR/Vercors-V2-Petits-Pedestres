export default function checkOptions() {
  // Affichage de la section des pass 1 journée au clic de "Pass 1 Jour"
  let pass1jourChoix = document.querySelectorAll(
    "#pass1jour, #pass1jourReduction"
  );
  let pass1jourDate = document.querySelector("#pass1jourDate");
  pass1jourChoix.forEach((pass1jourChoix) => {
    pass1jourChoix.addEventListener("change", () => {
      if (pass1jourChoix.checked == true) {
        pass1jourDate.classList.add("blocPassVisible");
        pass1jourDate.classList.remove("blocPassInvisible");
      } else {
        pass1jourDate.classList.remove("blocPassVisible");
        pass1jourDate.classList.add("blocPassInvisible");
      }
    });
  });

  // Si l'utilisateur sélectionne les 3 pass jour 1, cela lui sélectionne automatiquement le pass 3 jours (et désélectionne les pass 1 jour).

  let choixPass1Jour = document.querySelectorAll(".choixPass1Jour");
  let pass3jours = document.getElementById("pass3jours");
  let choixJour1 = document.getElementById("choixJour1");
  let choixJour2 = document.getElementById("choixJour2");
  let choixJour3 = document.getElementById("choixJour3");
  let pass2jours = document.getElementById("pass2jours");

  choixPass1Jour.forEach((choixPass1Jour) => {
    choixPass1Jour.addEventListener("change", () => {
      if (
        choixJour1.checked == true &&
        choixJour2.checked == true &&
        choixJour3.checked == true &&
        tarifReduit.checked == false
      ) {
        pass3jours.checked = true;
        choixJour1.checked = false;
        choixJour2.checked = false;
        choixJour3.checked = false;
        pass1jour.checked = false;
        pass2jours.checked = false;
        pass2joursReduc.checked = false;
        pass1jourReduc.checked = false;
        Pass3joursReduc.checked = false;
      }
    });
  });

  // Si l'utilisateur séléctionne les 3 jours 1 en reduction, cela lui sélectionne directement le pass 3 jours réduction (et enlève les 3 pass 1 jour).
  let pass2joursReduc = document.getElementById("pass2joursReduction");
  let pass1jourReduc = document.getElementById("pass1jourReduction");
  let pass3joursReduc = document.getElementById("pass3joursReduction");
  let tarifReduit = document.getElementById("tarifReduit");
  choixPass1Jour.forEach((choixPass1Jour) => {
    choixPass1Jour.addEventListener("change", () => {
      if (
        pass1jourReduc.checked == true &&
        choixJour1.checked == true &&
        choixJour2.checked == true &&
        choixJour3.checked == true &&
        tarifReduit.checked == true
      ) {
        pass3jours.checked = false;
        choixJour1.checked = false;
        choixJour2.checked = false;
        choixJour3.checked = false;
        pass1jour.checked = false;
        pass2jours.checked = false;
        pass2joursReduc.checked = false;
        pass1jourReduc.checked = false;
        pass3joursReduc.checked = true;
      }
    });
  });

  let pass2joursChoix = document.querySelectorAll(
    "#pass2jours, #pass2joursReduction"
  );
  let pass2joursDate = document.querySelector("#pass2joursDate");
  pass2joursChoix.forEach((pass2joursChoix) => {
    pass2joursChoix.addEventListener("change", () => {
      if (pass2joursChoix.checked == true) {
        pass2joursDate.classList.add("blocPassVisible");
        pass2joursDate.classList.remove("blocPassInvisible");
      } else {
        pass2joursDate.classList.remove("blocPassVisible");
        pass2joursDate.classList.add("blocPassInvisible");
      }
    });
  });

  let choixPass2Jours = document.querySelectorAll('input[name="choixPass2"]');
  let btns = document.querySelectorAll("#choixJour12, #choixJour23");
  choixPass2Jours.forEach((choixPass2Jours) => {
    choixPass2Jours.addEventListener("change", () => {
      btns.forEach((btn) => {
        if (btn.checked) {
          btn.checked = false;
        }
      });
    });
  });

  btns.forEach((btn) => {
    btn.addEventListener("click", () => {
      btns.forEach((autreBouton) => {
        if (autreBouton !== btn && autreBouton.checked) {
          autreBouton.checked = false;
        }
      });
    });
  });

  // Affichage des boutons de réduction au clic et disparition des boutons au prix normal.

  let btnPassNormaux = document.querySelectorAll(
    ".pass1jour, .pass2jours, .pass3jours"
  );
  let btnPassReduction = document.querySelectorAll(
    ".pass1jourReduction, .pass2joursReduction, .pass3joursReduction"
  );

  tarifReduit.addEventListener("change", () => {
    if (tarifReduit.checked == true) {
      btnPassReduction.forEach((btnPassReduction) => {
        btnPassReduction.classList.add("blocPassVisible");
        btnPassReduction.classList.remove("blocPassInvisible");
      });
      btnPassNormaux.forEach((btnPassReduction) => {
        btnPassReduction.classList.remove("blocPassVisible");
        btnPassReduction.classList.add("blocPassInvisible");
      });
    } else {
      btnPassReduction.forEach((btnPassReduction) => {
        btnPassReduction.classList.remove("blocPassVisible");
        btnPassReduction.classList.add("blocPassInvisible");
      });
      btnPassNormaux.forEach((btnPassReduction) => {
        btnPassReduction.classList.add("blocPassVisible");
        btnPassReduction.classList.remove("blocPassInvisible");
      });
    }
  });

  // Affichage de la section des casques enfants lorsque l'utilisateur clique sur "Oui".
  let checkEnfants = document.querySelector("#enfantsOui");
  let sectionEnfants = document.querySelector(".casquesEnfants");

  checkEnfants.addEventListener("click", () => {
    if (checkEnfants.checked == true) {
      sectionEnfants.classList.add("blocPassVisible");
      sectionEnfants.classList.remove("blocPassInvisible");
    } else {
      sectionEnfants.classList.remove("blocPassVisible");
      sectionEnfants.classList.add("blocPassInvisible");
    }
  });
}