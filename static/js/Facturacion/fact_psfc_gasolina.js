$(document).ready(function () {
    $("#sidebarCollapse").on("click", function () {
      $("#sidebar, #content").toggleClass("active");
      $(".collapse.in").toggleClass("in");
      $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });

    //Rango de fecha de principio de año al dia actual
    fhf = moment(obtenerFechaFinDeMes()).format("YYYY-MM-DD");
    fhi = moment(obtenerFechaInicioDeMes()).format("YYYY-MM-DD");
    $("#rangoFechas").html("Periodo del " + fhi + " al " + fhf + "");

    $("#tablePedidosFacturas tfoot th").each(function () {
        var title = $(this).text();
        $(this).html(
          '<input type="text" placeholder="Filtrar.. ' + title + ' " />'
        );
      });
      var table = $("#tablePedidosFacturas").DataTable({
        scrollX: true,
        scrollY: "250px",
        scrollCollapse: false,
        paging: false,
        responsive: true,
        "scrollCollapse": true,
        lengthMenu: [
          [10, 20, 50, -1],
          [10, 20, 50, "Todos"],
        ],
        dom: 'B<"float-left"l><"float-right"f>ti<"float-right"p><"clearfix"><br/>',
        responsive: false,
        language: {
          url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
        },
        order: [[0, "desc"]],
        drawCallback: function () {
          //alert("La tabla se está recargando");
          var api = this.api();
          $(api.column(11).footer()).html(
            api
              .column(11, { page: "current" })
              .data()
              .sum()
              .toLocaleString("es-MX")
          );
        },
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
            title: "H. Facturas Gracoil",
            text: '<i class="fas fa-file-excel"></i>',
            className: "btn btn-primary",
          },
          {
            extend: "csvHtml5",
            title: "H. Facturas Gracoil",
            text: '<i class="fa-solid fa-file-csv"></i>',
            className: "btn btn-default btn-sm",
          },
          {
            extend: "pdfHtml5",
            title: "H. Facturas Gracoil",
            text: '<i class="fas fa-file-pdf"></i>',
            className: "btn btn-default",
            orientation: "landscape",
            footer: "true",
            exportOptions: {
              columns: ":visible",
            },
          },
          {
            extend: "print",
            title: "H. Facturas Gracoil",
            className: "btn btn-default",
            text: '<i class="fa-solid fa-print"></i>',
            footer: "true",
            exportOptions: {
              columns: ":visible",
            },
          },
          {
            extend: "copy",
            title: "H. Facturas Gracoil",
            className: "btn btn-default",
            text: '<i class="fas fa-copy"></i>',
          },
          "colvis",
          {
            extend: "print",
            text: '<i class="fas fa-print"></i>',
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
  

  //funciones fuera del JQuery
  const obtenerFechaInicioDeMes = () => {
    const fechaInicio = new Date();
    // Iniciar en este año, este mes, en el día 1
    return new Date(fechaInicio.getFullYear(), 0, 1);
  };


  const obtenerFechaFinDeMes = () => {
    const fechaFin = new Date();
    // Iniciar en este año, el siguiente mes, en el día 0 (así que así nos regresamos un día)
    return new Date(
      fechaFin.getFullYear(),
      fechaFin.getMonth() + 1,
      fechaFin.getDate()
    );
  };

  