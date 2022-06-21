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



async function get_Datos(){
  $.ajax({
    type: "POST",
    url: "./back/get_empleadoById.php",
    data: {
      id_emp: id_url,
    },
    async: true,
    beforeSend: function() {

    },
    success: function(response) {
        if (response != 'noData') {
            let info = JSON.parse(response);

            //document.getElementById("id").innerHTML = info.id_emp;
            
            document.getElementById("nombre").innerHTML = '<i class="fa fa-user"></i><b> Nombre: </b>' + info.nom +' '+ info.ap1 +' '+ info.ap2;
             document.getElementById("telefono").innerHTML = '<i class="fa fa-phone"></i><b>Teléfono:</b> ' + info.tel_mov; 
            document.getElementById("correo").innerHTML = '<i class="fa-solid fa-envelope"></i><b>Correo:</b>' + info.correo; 
            document.getElementById("num_conct_emerg").innerHTML = '<i class="fa fa-phone"></i><b>Conctato Emergencia:</b> ' + info.num_conct_emer;  

            document.getElementById("nss").value = info.NSS;
            document.getElementById("CURP").value = info.CURP;
            document.getElementById("RFC").value = info.RFC;
            document.getElementById("fech_nac").value = info.Fech_nac;
            document.getElementById("grad_aca").value = info.gra_aca;
            document.getElementById("nom_carr").value = info.nom_carr;
            document.getElementById("estado_civil").value = info.est_civ;
            document.getElementById("hijos").value = info.hijos;
            document.getElementById("num_hijos").value = info.num_hijos;
         

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




  

  