/*
autor: Saul Juarez Martinez
Creacion: 25/05/2022
Ultima modificacion: 25/05/2022
Descripcion: JS que sirven para manipular los elemtos de html Reporte de Infrastructure
*/

$(document).ready(function () {
    $("#sidebarCollapse").on("click", function () {
      $("#sidebar, #content").toggleClass("active");
      $(".collapse.in").toggleClass("in");
      $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });
    //funciones para esconder y mostrar el conenido
    $("#toggleGracoil").on("click", function () {
      $("#gracoil").toggle("slow");
      $("#inter").hide("slow");
    });
  
    $("#toggleInter").on("click", function () {
      $("#inter").toggle("slow");
      $("#gracoil").hide("slow");
    });
  

  
    //tabla reporte Gracoil
    $("#tableGracoil tfoot th").each(function () {
      var title = $(this).text();
      $(this).html(
        '<input type="text" placeholder="Filtrar.. ' + title + ' " />'
      );
    });
    
   $("#tableGracoil").DataTable({
    "sScrollX": "100%",
    "sScrollXInner": "100%",
    "bScrollCollapse": true,
      scrollY: "250px",
      paging: false,
      responsive: true,
      scrollCollapse: true,
      stateSave: true,
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

  //tabla reporte Gracoil
    $("#tableInter tfoot th").each(function () {
      var title1 = $(this).text();
      $(this).html(
        '<input type="text" placeholder="Filtrar.. ' + title1 + ' " />'
      );
    });
    
   $("#tableInter").DataTable({
    "sScrollX": "100%",
    "sScrollXInner": "100%",
    "bScrollCollapse": true,
      scrollY: "250px",
      paging: false,
      responsive: true,
      scrollCollapse: true,
      stateSave: true,
      lengthMenu: [
        [10, 20, 50, -1],
        [10, 20, 50, "Todos"],
      ],
      dom: 'B<"float-left"l><"float-right"f>ti<"float-right"p><"clearfix"><br/>',
      responsive: true,
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
