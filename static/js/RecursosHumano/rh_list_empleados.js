$(document).ready(function () {
  //funcion para el menu lateral se oculte
    $("#sidebarCollapse").on("click", function () {
      $("#sidebar, #content").toggleClass("active");
      $(".collapse.in").toggleClass("in");
      $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });

  
    //data table de gracoil
    $("#tableListaEmpleados tfoot th").each(function () {
        var title = $(this).text();
        $(this).html(
          '<input type="text" placeholder="Filtrar.. ' + title + ' " />'
        );
      });
      var tableA = $("#tableListaEmpleados").DataTable({
        scrollX: true,
        scrollY: "250px",
        scrollCollapse: true,
        paging: true,
        lengthMenu: [
          [10, 20, 50, -1],
          [10, 20, 50, "Todos"],
        ],
        dom: 'B<"float-left"l><"float-right"f>ti<"float-right"p><"clearfix"><br/>',
        language: {
          url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
        },
        order: [[0, "desc"]],
     /*    drawCallback: function () {
          //alert("La tabla se está recargando");
          var api = this.api();
          $(api.column(8).footer()).html(
            api
              .column(8, { page: "current" })
              .data()
              .sum()
              .toLocaleString("es-MX")
          );

        }, */
        initComplete: function () {
          this.api()
            .columns()
            .every(function () {
              var that = this;

              $("input", this.footer()).on("keyup change", function () {
                if (that.search() !== this.value) {
                  that.search(this.value).draw();
                }
              });
            });
        },
        buttons: [
          {
            extend: "excelHtml5",
            title: "Lista Empleados",
            text: '<i class="fas fa-file-excel"></i>',
            className: "btn-excel",
            exportOptions: {
              columns: ":visible",
            },
          },
          {
            extend: "csvHtml5",
            title: "Lista Empleados",
            text: '<i class="fa-solid fa-file-csv"></i>',
            className: "btn-csv",
          },
          {
            extend: "pdfHtml5",
            title: "Lista Empleados",
            text: '<i class="fas fa-file-pdf"></i>',
            className: "btn-pdf",
            orientation: "landscape",
            footer: "true",
            exportOptions: {
              columns: ":visible",
            },
          },
          {
            extend: "print",
            title: "Lista Empleados",
            className: "btn-imprimir",
            text: '<i class="fa-solid fa-print"></i>',
            footer: "true",
            exportOptions: {
              columns: ":visible",
            },
          },
          {
            extend: "copy",
            title: "Lista Empleados",
            className: "btn-copiar",
            text: '<i class="fas fa-copy"></i>',
          },
          {
            extend: "colvis",
            title: "Ocultar/Mostar Columnas",
            className: "btn-ocultar",
            text: '<i class="fas fa-eye"></i>',
          },
          {
            extend: "print",
            text: '<i class="fas fa-print"></i>',
            className: "btn-imprimir",
            exportOptions: {
              modifier: {
                selected: null,
              },
            },
          },
        ],
        select: true,
        stateSave: true,
      }); 

  });



function editar(id)
{
  /* 
  
  local 

  setTimeout(() => {
    window.location.href = `../RH/edit_empleado.php?id=${id}`;
  }, 100); */

  setTimeout(() => {
    window.location.href = `../ExpedienteClinico/edit_empleado.php?id=${id}`;
  }, 100);
}

function eliminar(id){
  $.ajax({
    type: "POST",
     url: "./back/exist_CURP.php",
   /*url: "../RH/back/exist_CURP.php", */
    data: {
      id_emp: id,
    },
    async: true,
    beforeSend: function() {

    },
    success: function(response) {
        if (response != 'noData') {
            let info = JSON.parse(response);
            document.getElementById("id_elim").value = info.id_emp;
            document.getElementById("nom_emp").value = info.nom + ' ' + info.ap1 + ' ' + info.ap2;
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

function ver_mas(id)
{
  setTimeout(() => {
    window.location.href = `empleado.php?id=${id}`;
  }, 100);
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

document.getElementById("fecha_regis").value = fechahoy();

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


function validar_curp(){

  let curp = document.getElementById('CURP').value;

  if(curp == ''){
    
  }else {
    $.ajax({
      type: "POST",
      url: "./back/exist_CURP.php",
      data: {
        curp: curp,
      },
      async: true,
      beforeSend: function() {
  
      },
      success: function(response) {
        /* console.log(response); */
        if (response != 'noData') {
          let info = JSON.parse(response);
          if(info.CURP == curp){
            alert("El CURP " + curp + " ya ha sido dado de alta");
            document.getElementById('CURP').value = '';
          }
      }else {
          
         //console.log(dataUsuarios);
      }
      },
      error: function(error) {
          console.log(error);
      }
  });
  }
}

  