$(document).ready(function () {
  //funcion para el menu lateral se oculte
  $("#sidebarCollapse").on("click", function () {
    $("#sidebar, #content").toggleClass("active");
    $(".collapse.in").toggleClass("in");
    $("a[aria-expanded=true]").attr("aria-expanded", "false");
  });
  obtener_datos();
});

function obtener_edad() {
  let id = document.getElementById("empleado").value;

  if (typeof id === "undefined" || id === "") {
    document.getElementById("edad").value = "";
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
          document.getElementById("edad").value = calcularEdad(info.Fech_nac);
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

function calcularEdad(fecha) {
  var hoy = new Date();
  var cumpleanos = new Date(fecha);
  var edad = hoy.getFullYear() - cumpleanos.getFullYear();
  var m = hoy.getMonth() - cumpleanos.getMonth();

  if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
      edad--;
  }

  return edad;
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



function calcularIMC() {
  let imc;
  imc = document.getElementById("peso").value / (document.getElementById("talla").value * document.getElementById("talla").value);
  document.getElementById("imc").value = imc.toFixed(2);  

}

function ICC() {
    document.getElementById("icc").value = ( document.getElementById("cadera").value / document.getElementById("cintura").value) ;
}


let queryString = window.location.search;
let urlParams = new URLSearchParams(queryString);
let id_url = urlParams.get('id');


function obtener_datos(){
  $.ajax({
    type: "POST",
    url: "./back/get_peso_talla_filtradoById.php",
    data: {
      id_rtp: id_url,
    },
    async: true,
    beforeSend: function() {

    },
    success: function(response) {
        if (response != 'noData') {
            let info = JSON.parse(response);
          
            document.getElementById('id_rpt').value = info.id_rpt;
            document.getElementById('empleado').value = info.id_emp;
            document.getElementById('ubicacion').value = info.id_ubic;
            document.getElementById('edad').value = info.edad;
            document.getElementById('fech_regis').value = info.fecha_regis;
            document.getElementById('talla').value = info.talla;
            document.getElementById('peso').value = info.peso;
            document.getElementById('imc').value = info.IMC;
            document.getElementById('cintura').value = info.cintura;            
            document.getElementById('cadera').value = info.cadera;
            document.getElementById('porc_gra').value = info.porc_gra;
            document.getElementById('porc_musc').value = info.porc_musc;
            document.getElementById('glucosa').value = info.glucosa;
            document.getElementById('MA').value = info.MA;
            document.getElementById('T_A').value = info.T_A;

        }else {
            let dataUsuarios = "No hay registros con ese ID";
           //console.log(dataUsuarios);
        }

    },
    error: function(error) {
        console.log(error);
    }
});
}