$(document).ready(function () {
  //funcion para el menu lateral se oculte
  $("#sidebarCollapse").on("click", function () {
    $("#sidebar, #content").toggleClass("active");
    $(".collapse.in").toggleClass("in");
    $("a[aria-expanded=true]").attr("aria-expanded", "false");
  });
});

function obtner_datos_empleado() {
  let id = document.getElementById("empleado").value;

  if (typeof id === "undefined" || id === "") {
    document.getElementById("nom").value = "";
    document.getElementById("ap1").value = "";
    document.getElementById("ap2").value = "";
    document.getElementById("fech_nac").value = "";
  } else {
    $.ajax({
      type: "POST",
      url: "../RH/back/get_empleadoById.php",
      data: {
        id_emp: id,
      },
      async: true,
      beforeSend: function () {},
      success: function (response) {
        if (response != "noData") {
          let info = JSON.parse(response);
            document.getElementById("nom").value = info.nom;
            document.getElementById("ap1").value = info.ap1;
            document.getElementById("ap2").value = info.ap2;
            document.getElementById("fech_nac").value = info.Fech_nac;
            document.getElementById("tel").value = info.tel_mov;
        } else {
          let dataUsuarios = "No hay registros con ese ID";
          //console.log(dataUsuarios);
        }
      },
      error: function (error) {
        console.log(error);
      },
    });
  }
}

document.getElementById("fech_regis").value = fechahoy();

function fechahoy() {
  let hoy;
  let date = new Date();
  let day = date.getDate();
  let month = date.getMonth() + 1;
  let year = date.getFullYear();

  if (month < 10 && day < 10) {
    return (hoy = `${year}-0${month}-0${day}`);
  } else if (month < 10) {
    return (hoy = `${year}-0${month}-${day}`);
  } else {
    return (hoy = `${year}-${month}-${day}`);
  }
}

function Alergias() {
  if (
    document.getElementById("alergias").value != "" &&
    document.getElementById("alergias").value == "SI"
  ) {
    document.getElementById("desc_alergias").removeAttribute("readonly");
  } else if (
    document.getElementById("alergias").value != "" &&
    document.getElementById("alergias").value == "NO"
  ) {
    document
      .getElementById("desc_alergias")
      .setAttribute("readonly", "readonly");
  } else {
    document
      .getElementById("desc_alergias")
      .setAttribute("readonly", "readonly");
  }
}

function calcularIMC() {
  document.getElementById("imc").value =
    document.getElementById("peso").value /
    (document.getElementById("talla").value *
      document.getElementById("talla").value);
}

function ICC() {
    document.getElementById("icc").value = ( document.getElementById("cadera").value / document.getElementById("cintura").value) ;
}
