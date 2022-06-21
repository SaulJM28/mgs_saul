$(document).ready(function () {
  //funcion para el menu lateral se oculte
    $("#sidebarCollapse").on("click", function () {
      $("#sidebar, #content").toggleClass("active");
      $(".collapse.in").toggleClass("in");
      $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });

  });


document.getElementById('fecha_solic').value = fechahoy();

function fechahoy(){
  let hoy;
  let date = new Date()
  let day = date.getDate()
  let month = date.getMonth() + 1
  let year = date.getFullYear()

  if(month < 10  && day < 10){
    return hoy = (`${year}-0${month}-0${day}`);
  }else if(month < 10 ){
    return hoy = (`${year}-0${month}-${day}`);
  }else {
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

