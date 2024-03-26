//si la checkbox tenteNuit1 tenteNuit2 tenteNuit3 est coché, les désactivées et coché tent3nuits

function checkTente() {
  let tenteNuit1 = document.querySelector("#tenteNuit1");
  let tenteNuit2 = document.querySelector("#tenteNuit2");
  let tenteNuit3 = document.querySelector("#tenteNuit3");
  let tente3Nuits = document.querySelector("#tente3Nuits");
  if (
    tenteNuit1.checked == true &&
    tenteNuit2.checked == true &&
    tenteNuit3.checked == true
  ) {
    tente3Nuits.checked = true;
    tenteNuit1.checked = false;
    tenteNuit2.checked = false;
    tenteNuit3.checked = false;
  }
  if (
    (tente3Nuits.checked == true && tenteNuit1.checked == true) ||
    tenteNuit2.checked == true ||
    tenteNuit3.checked == true
  ) {
    tente3Nuits.checked = false;
  }
}

//si la checkbox vanNuit1 vanNuit2 vanNuit3 est coché, les désactivées et coché van3Nuits
function checkVan() {
  let vanNuit1 = document.querySelector("#vanNuit1");
  let vanNuit2 = document.querySelector("#vanNuit2");
  let vanNuit3 = document.querySelector("#vanNuit3");
  let van3Nuits = document.querySelector("#van3Nuits");
  if (
    vanNuit1.checked == true &&
    vanNuit2.checked == true &&
    vanNuit3.checked == true
  ) {
    van3Nuits.checked = true;
    vanNuit1.checked = false;
    vanNuit2.checked = false;
    vanNuit3.checked = false;
  }
  if (
    (van3Nuits.checked == true && vanNuit1.checked == true) ||
    vanNuit2.checked == true ||
    vanNuit3.checked == true
  ) {
    van3Nuits.checked = false;
  }
}

function checkEnfants() {
  let enfantsOui = document.querySelector("#enfantsOui");
  let enfantsNon = document.querySelector("#enfantsNon");
  if (enfantsOui.checked == true) {
    enfantsNon.checked == false;
  } else if (enfantsOui.checked == true) {
    enfantsOui.checked == false;
  }
}

export { checkTente, checkVan, checkEnfants };
