$(document).ready(function () {
  //funcion para el menu lateral se oculte
    $("#sidebarCollapse").on("click", function () {
      $("#sidebar, #content").toggleClass("active");
      $(".collapse.in").toggleClass("in");
      $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });
    get_Datos();
  });



let queryString = window.location.search;
let urlParams = new URLSearchParams(queryString);
let id_url = urlParams.get('id');



function get_Datos(){
 
  $.ajax({
    type: "POST",
    url: "./back/get_listActividadById.php",
    data: {
      id_ac: id_url
    },
    async: true,
    beforeSend: function() {

    },
    success: function(response) {
        if (response != 'noData') {
            let info = JSON.parse(response);
            document.getElementById('id_ac').value = info.id_ac;
            document.getElementById('nom_acti').value = info.acti; 
            document.getElementById('fecha_lim').value = info.fecha_lim;
            document.getElementById('avance').value = info.avance;
            /* document.getElementById('prese').value = info.present; */
            document.getElementById('revi').value = info.revisado;
            document.getElementById('comp').value = info.comp;
            document.getElementById('dpto').value = info.dept; 
            document.getElementById('observaciones').value = info.obser;
        }else {
            let dataUsuarios = "No hay registros con ese ID";
           
        }

    },
    error: function(error) {
        console.log(error);
    }
});

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

