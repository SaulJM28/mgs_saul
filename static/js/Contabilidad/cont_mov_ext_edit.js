$(document).ready(function () {
  //funcion para el menu lateral se oculte
    $("#sidebarCollapse").on("click", function () {
      $("#sidebar, #content").toggleClass("active");
      $(".collapse.in").toggleClass("in");
      $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });
    get_Datos();
    cal_dias_atraso();
  });



let queryString = window.location.search;
let urlParams = new URLSearchParams(queryString);
let id_url = urlParams.get('id');




async function get_Datos(){
  
  $.ajax({
    type: "POST",
    url: "./back/get_formatoMovById.php",
    data: {
      id_ext: id_url
    },
    async: true,
    beforeSend: function() {

    },
    success: function(response) {
        if (response != 'noData') {
            let info = JSON.parse(response);
            document.getElementById('id_ext').value = info.id_ext;
            document.getElementById('num_ope').value = info.no_ope;
            document.getElementById('clv_sol_inc').value = info.clv_sol_inc;
            document.getElementById('area').value = info.area;
            document.getElementById('proceso').value = info.proceso;
            document.getElementById('importe').value = info.importe;
            document.getElementById('solicitud').value = info.solicitud;
            document.getElementById('fec_lim_reg').value = info.fec_lim_reg;
            document.getElementById('fec_cap').value = info.fec_cap;
            document.getElementById('dias_atra').value = info.dias_atra;
            document.getElementById('justificacion').value = info.just;
            document.getElementById('observaciones').value = info.obser;
            document.getElementById('nom_resp_area').value = info.nom_resp_area;
            document.getElementById('nom_resp_pro').value = info.nom_resp_proc;
            document.getElementById('emp').value=info.empresa;
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



function cal_dias_atraso()
 {

 var fecha1 = moment(document.getElementById('fec_lim_reg').value);
 var fecha2 = moment(document.getElementById('fec_cap').value);
 
var dias_atraso = fecha2.diff(fecha1, 'days');

document.getElementById('dias_atra').value=dias_atraso;

 }


document.getElementById('fec_cap').value = fechahoy(); 

function fechahoy(){
  let hoy;
  let date = new Date()
  let day = date.getDate()
  let month = date.getMonth() + 1
  let year = date.getFullYear()

  if(month < 10 && day < 10){
    return hoy = (`${year}-0${month}-0${day}`);
  }else if(month < 10){
    return hoy = (`${year}-0${month}-${day}`);
  }else{
    return hoy = (`${year}-${month}-${day}`);
  }
        
}


//manipulamos el DOM en emomento antes de enviar los datos por POST
document.addEventListener("DOMContentLoaded", function(event) {
  document.getElementById('mi_formulario').addEventListener('submit', 
manejadorValidacion)
});

//funcion que nos ayuda a validar los campos
function manejadorValidacion(e) {
  e.preventDefault();
   this.submit();
  }

