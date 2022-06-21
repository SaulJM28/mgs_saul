$(document).ready(function () {
  //funcion para el menu lateral se oculte
  $("#sidebarCollapse").on("click", function () {
    $("#sidebar, #content").toggleClass("active");
    $(".collapse.in").toggleClass("in");
    $("a[aria-expanded=true]").attr("aria-expanded", "false");
  });

  calcular_dif_sal();
  get_Datos();


});

let queryString = window.location.search;
let urlParams = new URLSearchParams(queryString);
let id_url = urlParams.get('id');

function get_Datos(){
  $.ajax({
    type: "POST",
    url: "./back/get_salariosEmpleadoById.php",
    data: {
      id_suemp: id_url,
    },
    async: true,
    beforeSend: function() {

    },
    success: function(response) {
        if (response != 'noData') {
            let info = JSON.parse(response);
            document.getElementById('id').value = info.id_suemp;
            document.getElementById('id_emp').value = info.id_emp;
            document.getElementById('nombre').value = info.nom + ' ' + info.ap1 + ' ' + info.ap2;
            document.getElementById('fech_regis').value = info.fecha_regi;
            document.getElementById('sal_actual').value = info.sueldo_anterior;
            document.getElementById('sal_nuevo').value = info.nuevo_sueldo;
            document.getElementById('sal_dif').value = info.dif_sueldo;

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



function calcular_dif_sal(){
  let salario_viejo = document.getElementById('sal_actual').value;

  let porcentaje = document.getElementById('porcentaje').value;

  porcentaje = parseFloat(porcentaje) + parseFloat(100);
  
  salario_nuevo = (porcentaje * salario_viejo)/100;

  let diferencia = salario_nuevo - salario_viejo 

  document.getElementById('sal_nuevo').value = salario_nuevo;
  document.getElementById('sal_dif').value = diferencia;

  
}



