$(document).ready(function () {
  //funcion para el menu lateral se oculte
    $("#sidebarCollapse").on("click", function () {
      $("#sidebar, #content").toggleClass("active");
      $(".collapse.in").toggleClass("in");
      $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });

    $("#datosInter").hide("slow");
    $("#datosCarbu").hide("slow");
    $("#datosNino").hide("slow");
    //funciones para ocultar y mostrar tablas
    $("#ocultarGracoil").on("click", function () {
      $("#datosGracoil").toggle("slow");
      $("#datosInter").hide("slow");
      $("#datosCarbu").hide("slow");
      $("#datosNino").hide("slow");
    });

    $("#ocultarInter").on("click", function () {
      $("#datosInter").toggle("slow");
      $("#datosGracoil").hide("slow");
      $("#datosCarbu").hide("slow");
      $("#datosNino").hide("slow");
    });

    $("#ocultarCarbu").on("click", function () {
      $("#datosCarbu").toggle("slow");
      $("#datosGracoil").hide("slow");
      $("#datosInter").hide("slow");
      $("#datosNino").hide("slow");
    });

    $("#ocultarNino").on("click", function () {
      $("#datosNino").toggle("slow");
      $("#datosGracoil").hide("slow");
      $("#datosInter").hide("slow");
      $("#datosCarbu").hide("slow");
    });



    //data table de gracoil
    $("#tableExtGracoil tfoot th").each(function () {
        var title = $(this).text();
        $(this).html(
          '<input type="text" placeholder="Filtrar.. ' + title + ' " />'
        );
      });
      var tableG = $("#tableExtGracoil").DataTable({
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
              columns: [ 0, 1, 2, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
          }
          },
          {
            extend: "csvHtml5",
            title: "",
            text: '<i class="fa-solid fa-file-csv"></i>',
            className: "btn-csv",
            exportOptions: {
              columns: [ 0, 1, 2, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
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
              columns: [ 0, 1, 2, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
          }
          },
          {
            extend: "print",
            title: "",
            className: "btn-imprimir",
            text: '<i class="fa-solid fa-print"></i>',
            footer: "true",
            exportOptions: {
              columns: [ 0, 1, 2, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
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
                columns: [ 0, 1, 2, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
            },
          },
        ],
        select: true,
        stateSave: true,
      }); 
      //data table de Inter
      $("#tableExtInter tfoot th").each(function () {
        var title = $(this).text();
        $(this).html(
          '<input type="text" placeholder="Filtrar.. ' + title + ' " />'
        );
      });
      var tableI = $("#tableExtInter").DataTable({
        scrollX: true,
        scrollY: "250px",
        scrollCollapse: false,
        paging: true,
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
        /* drawCallback: function () {
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
          },
          {
            extend: "csvHtml5",
            title: "",
            text: '<i class="fa-solid fa-file-csv"></i>',
            className: "btn-csv",
          },
          {
            extend: "pdfHtml5",
            title: "",
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
            title: "",
            className: "btn-imprimir",
            text: '<i class="fa-solid fa-print"></i>',
            footer: "true",
            exportOptions: {
              columns: ":visible",
            },
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
            },
          },
        ],
        select: true,
        stateSave: true,
      }); 
      //data table de Carburantes del centro
      $("#tableExtCarbu tfoot th").each(function () {
        var title = $(this).text();
        $(this).html(
          '<input type="text" placeholder="Filtrar.. ' + title + ' " />'
        );
      });
      var tableC = $("#tableExtCarbu").DataTable({
        scrollX: true,
        scrollY: "250px",
        scrollCollapse: false,
        paging: true,
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
       /*  drawCallback: function () {
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
          },
          {
            extend: "csvHtml5",
            title: "",
            text: '<i class="fa-solid fa-file-csv"></i>',
            className: "btn-csv",
          },
          {
            extend: "pdfHtml5",
            title: "",
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
            title: "",
            className: "btn-imprimir",
            text: '<i class="fa-solid fa-print"></i>',
            footer: "true",
            exportOptions: {
              columns: ":visible",
            },
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
            },
          },
        ],
        select: true,
        stateSave: true,
      }); 
      //data table de transliquidos
      $("#tableExtNino tfoot th").each(function () {
        var title = $(this).text();
        $(this).html(
          '<input type="text" placeholder="Filtrar.. ' + title + ' " />'
        );
      });
      var tableN = $("#tableExtNino").DataTable({
        scrollX: true,
        scrollY: "250px",
        scrollCollapse: false,
        paging: true,
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
      /*   drawCallback: function () {
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
          },
          {
            extend: "csvHtml5",
            title: "",
            text: '<i class="fa-solid fa-file-csv"></i>',
            className: "btn-csv",
          },
          {
            extend: "pdfHtml5",
            title: "",
            text: '<i class="fas fa-file-pdf"></i>',
            className: "btn-pdf",
            orientation: "landscape",
            footer: "true",
            exportOptions: {
              columns: [ 0, 1, 2, 5 ]
            },
          },
          {
            extend: "print",
            title: "",
            className: "btn-imprimir",
            text: '<i class="fa-solid fa-print"></i>',
            footer: "true",
            exportOptions: {
              columns: ":visible",
            },
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
            },
          },
        ],
        select: true,
        stateSave: true,
      }); 
  });


  function crear(){
    setTimeout( function() { window.location.href = "./create_FormatoMoviExtemp.php"; }, 100 );
  }


  function editar(id, empresa){
    setTimeout(() => {
      window.location.href = `edit_FormatoMoviExtemp.php?id=${id}`;
    }, 100);

  }

  function generar_pdf(id, empresa){
    setTimeout(() => {
      window.open(`pdf_FormatoMoviExtemp.php?id=${id}&empresa=${empresa}`,'','width=600,height=400,left=50,top=50,toolbar=yes');
    }, 100);

  }
  

  