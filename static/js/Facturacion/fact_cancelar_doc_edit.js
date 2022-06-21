$(document).ready(function () {
  //funcion para el menu lateral se oculte
    $("#sidebarCollapse").on("click", function () {
      $("#sidebar, #content").toggleClass("active");
      $(".collapse.in").toggleClass("in");
      $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });
    get_Datos()
  });


document.getElementById('fecha_solic').value = fechahoy();
let queryString = window.location.search;
let urlParams = new URLSearchParams(queryString);
let id_url = urlParams.get('id');
let empresa_url = urlParams.get('empresa');



async function get_Datos(){
  
  $.ajax({
    type: "POST",
    url: "./back/get_canDocById.php",
    data: {
      id_cd: id_url,
      empresa: empresa_url
    },
    async: true,
    beforeSend: function() {

    },
    success: function(response) {
        if (response != 'noData') {
            let info = JSON.parse(response);
            document.getElementById('id_cd').value = info.id_cd;
            document.getElementById('emp').value = info.nom_emp;
            document.getElementById('fecha_solic').value = info.fecha_sol;
            document.getElementById('demp_solic').value = info.dpt_sol;
            document.getElementById('desc_mot').value = info.desc_mov;
            document.getElementById('tip_mov').value = info.tip_mov; 
            document.getElementById('nom_clie').value = info.nom_clie;
            document.getElementById('num_doc').value = info.num_doc;
            document.getElementById('fec_doc').value = info.fecha_doc;
            document.getElementById('mon_doc').value = info.monto_doc;
            document.getElementById('fol_fisc_afect').value = info.fol_fisc;
            document.getElementById('num_doc_cred').value = info.num_doc_cred;
            document.getElementById('fec_doc_cred').value = info.fec_doc_cred;
            document.getElementById('mon_doc_cred').value = info.mon_doc_cred;
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

