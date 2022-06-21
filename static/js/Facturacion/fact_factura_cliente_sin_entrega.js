$(document).ready(function () {
    $("#sidebarCollapse").on("click", function () {
      $("#sidebar, #content").toggleClass("active");
      $(".collapse.in").toggleClass("in");
      $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });
    $("#tableFacturasClieSinEntrega tfoot th").each(function () {
        var title = $(this).text();
        $(this).html(
          '<input type="text" placeholder="Filtrar.. ' + title + ' " />'
        );
      });
      var table = $("#tableFacturasClieSinEntrega").DataTable({
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
  

  