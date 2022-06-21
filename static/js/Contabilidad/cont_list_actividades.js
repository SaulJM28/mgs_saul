$(document).ready(function () {
  //funcion para el menu lateral se oculte
    $("#sidebarCollapse").on("click", function () {
      $("#sidebar, #content").toggleClass("active");
      $(".collapse.in").toggleClass("in");
      $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });

  
    //data table de gracoil
    $("#tableListaActividades tfoot th").each(function () {
        var title = $(this).text();
        $(this).html(
          '<input type="text" placeholder="Filtrar.. ' + title + ' " />'
        );
      });
      var tableA = $("#tableListaActividades").DataTable({
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
            title: "",
            text: '<i class="fas fa-file-excel"></i>',
            className: "btn-excel",
            exportOptions: {
              columns: [ 0, 1, 2, 5, 6, 7 ]
          }
          },
          {
            extend: "csvHtml5",
            title: "",
            text: '<i class="fa-solid fa-file-csv"></i>',
            className: "btn-csv",
            exportOptions: {
              columns: [ 0, 1, 2, 5, 6, 7 ]
          }
          },
          {
            extend: "pdfHtml5",
            title: "",
            text: '<i class="fas fa-file-pdf"></i>',
            className: "btn-pdf",
            orientation: "landscape",
            footer: "true",
            exportOptions: {
              columns: [ 0, 1, 2, 5, 6, 7 ]
          }
          },
          {
            extend: "print",
            title: "",
            className: "btn-imprimir",
            text: '<i class="fa-solid fa-print"></i>',
            footer: "true",
            exportOptions: {
              columns: [ 0, 1, 2, 5, 6, 7 ]
          }
          },
          {
            extend: "copy",
            title: "",
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
                columns: [ 0, 1, 2, 5, 6, 7 ]
            },
          },
        ],
        select: true,
        stateSave: true,
      }); 

  });


  function editar(id){
    setTimeout(() => {
      window.location.href = `edit_actividad.php?id=${id}`;
    }, 100);
  }


  

  