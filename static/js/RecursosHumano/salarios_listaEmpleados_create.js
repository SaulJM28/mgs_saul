$(document).ready(function () {
  //funcion para el menu lateral se oculte
  $("#sidebarCollapse").on("click", function () {
    $("#sidebar, #content").toggleClass("active");
    $(".collapse.in").toggleClass("in");
    $("a[aria-expanded=true]").attr("aria-expanded", "false");
  });
});

document.getElementById('fech_regis').value = fechahoy(); 

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

function get_ultSueldo(){
  id = document.getElementById('empleado').value;
  if (id == ''){
    alert('Favor de seleccionar un empleado');
  }else {
    $.ajax({
      type: "POST",
      url: "./back/get_ultimoSalarioEmpleadoById.php",
      data: {
        id_emp: id,
      },
      async: true,
      beforeSend: function() {
  
      },
      success: function(response) {
          if (response != 'noData') {
              let info = JSON.parse(response);
              document.getElementById('sal_actual').value = info.sueldo;
  
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



