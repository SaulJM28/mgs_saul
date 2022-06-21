$(document).ready(function () {
  //funcion para el menu lateral se oculte
    $("#sidebarCollapse").on("click", function () {
      $("#sidebar, #content").toggleClass("active");
      $(".collapse.in").toggleClass("in");
      $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });

  });






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

