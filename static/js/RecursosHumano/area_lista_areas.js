$(document).ready(function () {
    //funcion para el menu lateral se oculte
    $("#sidebarCollapse").on("click", function () {
      $("#sidebar, #content").toggleClass("active");
      $(".collapse.in").toggleClass("in");
      $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });
  
    $("#tablaListaAreas tfoot th").each(function () {
      var title = $(this).text();
      $(this).html(
        '<input type="text" placeholder="Filtrar.. ' + title + ' " />'
      );
    });
  
    var table = $("#tablaListaAreas").DataTable({
        paging: true,
        stateSave: true,
        scrollY: '474px',
      lengthMenu: [
        [10, 20, 50, -1],
        [10, 20, 50, "Todos"],
      ],
      dom: 'B<"float-left"l><"float-right"f>ti<"float-right"p><"clearfix"><br/>',
      language: {
        url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
      },
      order: [[0, "desc"]],
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
          title: "Historial Expediente clinico Empleados",
          text: '<i class="fas fa-file-excel"></i>',
          className: "btn-excel",
          exportOptions: {
            columns: ":visible",
          },
        },
        {
          extend: "csvHtml5",
          title: "Historial Expediente clinico Empleados",
          text: '<i class="fa-solid fa-file-csv"></i>',
          className: "btn-csv",
        },
        {
          extend: "pdfHtml5",
          title: "Historial Expediente clinico Empleados",
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
          title: "Historial Expediente clinico Empleados",
          className: "btn-imprimir",
          text: '<i class="fa-solid fa-print"></i>',
          footer: "true",
          exportOptions: {
            columns: ":visible",
          },
        },
        {
          extend: "copy",
          title: "Historial Expediente clinico Empleados",
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
    });
  });


  function get_datos_edit(id) {
    $.ajax({
      type: "POST",
      url: "../Areas/back/get_areaById.php",
      data: {
        id_puesto: id,
      },
      async: true,
      beforeSend: function () {},
      success: function (response) {
        if (response != "noData") {
          let data = JSON.parse(response);
             
              document.getElementById("id_edit").value = data.id_puesto;
              document.getElementById("nom_area_edit").value = data.nom_puesto;

        } else {
          let dataUsuarios = "No hay registros con ese ID";
          //console.log(dataUsuarios);
        }
      },
      error: function (error) {
        console.log(error);
      },
    });
  }
  


  function get_datos_elim(id) {
    $.ajax({
      type: "POST",
      url: "../Areas/back/get_areaById.php",
      data: {
        id_puesto: id,
      },
      async: true,
      beforeSend: function () {},
      success: function (response) {
        if (response != "noData") {
          let data = JSON.parse(response);
             
              document.getElementById("id_elim").value = data.id_puesto;
              document.getElementById("nom_area_elim").value = data.nom_puesto;

        } else {
          let dataUsuarios = "No hay registros con ese ID";
          //console.log(dataUsuarios);
        }
      },
      error: function (error) {
        console.log(error);
      },
    });
  }
  
  

