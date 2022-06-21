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

            document.getElementById("id").value = info.id_emp;
            document.getElementById("nom_emp").value = info.nom;
            document.getElementById("ap1_emp").value = info.ap1;
            document.getElementById("ap2_emp").value = info.ap2;
         /*    document.getElementById("nss").value = info.NSS; */
            document.getElementById("CURP").value = info.CURP;
            /* document.getElementById("RFC").value = info.RFC; */
            document.getElementById("fech_nac").value = info.Fech_nac;
            /* document.getElementById("tel").value = info.tel_mov;
            document.getElementById("correo_emp").value = info.correo;
            document.getElementById("gra_aca").value = info.gra_aca;
            document.getElementById("nom_carr").value = info.nom_carr;
            document.getElementById("est_civ").value = info.est_civ;
            document.getElementById("hijos").value = info.hijos;
            document.getElementById("num_hijos").value = info.num_hijos;
            document.getElementById("num_conct_emerg").value = info.num_conct_emer;
            document.getElementById("sueldo").value = info.sueldo; */
            document.getElementById("fecha_regis").value = info.fec_alt;
            document.getElementById("empresa").value = info.empresa;
            document.getElementById("puesto").value = info.puesto;
            document.getElementById("ubicacion").value = info.ubicacion;            

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


function numhijos(){
  if(document.getElementById("hijos").value == "SI"){
    document.getElementById("num_hijos").removeAttribute('readonly');
  }else if(document.getElementById("hijos").value == "NO"){
    document.getElementById("num_hijos").setAttribute('readonly', 'readonly');
    document.getElementById("num_hijos").value  = "0";
  }else if(document.getElementById("hijos").value == ""){
    document.getElementById("num_hijos").setAttribute('readonly', 'readonly');
    document.getElementById("num_hijos").value  = "0";
  }
}
  



  

  