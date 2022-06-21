$(document).ready(function () {
  //funcion para el menu lateral se oculte
    $("#sidebarCollapse").on("click", function () {
      $("#sidebar, #content").toggleClass("active");
      $(".collapse.in").toggleClass("in");
      $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });

  });


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



function cal_dias_atraso()
 {

 var fecha1 = moment(document.getElementById('fec_lim_reg').value);
 var fecha2 = moment(document.getElementById('fec_cap').value);
 
var dias_atraso = fecha2.diff(fecha1, 'days');

document.getElementById('dias_atra').value=dias_atraso;

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

