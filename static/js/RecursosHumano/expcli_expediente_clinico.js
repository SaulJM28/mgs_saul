$(document).ready(function () {
  //funcion para el menu lateral se oculte
  $("#sidebarCollapse").on("click", function () {
    $("#sidebar, #content").toggleClass("active");
    $(".collapse.in").toggleClass("in");
    $("a[aria-expanded=true]").attr("aria-expanded", "false");
  });

  $("#tablaListaExpClinico tfoot th").each(function () {
    var title = $(this).text();
    $(this).html(
      '<input type="text" placeholder="Filtrar.. ' + title + ' " />'
    );
  });

  var table = $("#tablaListaExpClinico").DataTable({
    scrollX: true,
    scrollY: "525px",
    scrollCollapse: true,
    responsive: true,
    stateSave: true,
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

var table = $("#tablaListaExpClinicoFil").DataTable();

function filtrar_dato() {
  var fini = document.getElementById("fecha_inicio_filtro").value;
  var ffin = document.getElementById("fecha_fin_filtro").value;

  if (fini == "") {
    alert("Seleccione una fecha de inico");
  } else if (ffin == "") {
    alert("Seleccione una fecha de Termino");
  } else {
    document.getElementById("allDatosExpClinico").innerHTML = "";
    var y = document.getElementById("filterDatosExpCli");
    y.style.display = "block";
    table.destroy();

    $.ajax({
      type: "POST",
      url: "http://localhost/mgs_saul/recursosHumanos/ExpedienteClinico/back/get_expClinFiltrado.php",
      data: {
        fini: fini,
        ffin: ffin,
      },
      dataType: "json",
      success: function (data) {
        var html = "";
        $("#datostablaListaExpClinicoFil").empty();
        if (data.length > 0) {
          $.each(data, function (i) {
            {
              html =
                "<tr>" +
                "<td>" + data[i].nom + " " + data[i].ap1 + " " + data[i].ap2 + "</td>" +
                "<td>" + data[i].alergias + "</td>" +
                "<td>" + data[i].desc_alerg + "</td>" +
                "<td>" + data[i].talla + "</td>" +
                "<td>" + data[i].peso + "</td>" +
                "<td>" + data[i].IMC + "</td>" +
                "<td>" + data[i].cintura + "</td>" +
                "<td>" + data[i].cadera + "</td>" +
                "<td>" + data[i].porc_gra + "</td>" +
                "<td>" + data[i].porc_musc + "</td>" +
                "<td>" + data[i].edad_met + "</td>" +
                "<td>" + data[i].fecha_ult_covid + "</td>" +
                "<td>" + data[i].fecha_ult_anti + "</td>" +
                "<td>" + data[i].fecha_ult_alch + "</td>" +
                "<td>" + data[i].presion + "</td>" +
                "<td>" + data[i].glucosa + "</td>" +
                "<td>" + data[i].Observaciones + "</td>" +
                "<td>" + data[i].fecha_regis + "</td>" +
                " </tr>";
              $("#datostablaListaExpClinicoFil").append(html);
            }
          });

          $("#tablaListaExpClinicoFil tfoot th").each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Filtrar.." />');
          });

          table = $("#tablaListaExpClinicoFil").DataTable({
            scrollX: true,
            scrollY: "525px",
            scrollCollapse: true,
            responsive: true,
            stateSave: true,
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
        } else {
          $("#tablaListaExpClinicoFil tfoot th").each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Filtrar.." />');
          });

          table = $("#tablaListaExpClinicoFil").DataTable({
            scrollX: true,
            scrollY: "525px",
            scrollCollapse: true,
            responsive: true,
            stateSave: true,
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
        }
      },
      failure: function (response) {
        console.log(response.responseText);
      },
      error: function (response) {},
    });
  }
}
