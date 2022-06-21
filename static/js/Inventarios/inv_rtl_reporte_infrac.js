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
    $("#ReporteGracoil").toggle();
    $("#ReporteInter").hide();
    $("#ReporteMapa").hide();
  });

  $("#toggleInter").on("click", function () {
    $("#ReporteInter").toggle();
    $("#ReporteGracoil").hide();
    $("#ReporteMapa").hide();
  });

  $("#toggleMapa").on("click", function () {
    $("#ReporteMapa").toggle();
    $("#ReporteGracoil").hide();
    $("#ReporteInter").hide();
  });

  //tabla reporte Gracoil
  $("#tableReporteGracoil tfoot th").each(function () {
    var title = $(this).text();
    $(this).html(
      '<input type="text" placeholder="Filtrar.. ' + title + ' " />'
    );
  });
  
  var tableG = $("#tableReporteGracoil").DataTable({
    scrollX: true,
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
  //Tabla Reporte Interamericana
  $("#tableReporteInterDatos tfoot th").each(function () {
    var title = $(this).text();
    $(this).html(
      '<input type="text" placeholder="Filtrar.. ' + title + ' " />'
    );
  });

  var tableI = $("#tableReporteInterDatos").DataTable({
    scrollX: true,
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


});


//mapa usando la API de Google
google.charts.load("current", {
    "packages":["map"],
    // Note: you will need to get a mapsApiKey for your project.
    // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
    "mapsApiKey": "AIzaSyB78U9yh5ycVEa7FVqw10y1z1VkH2tArKA"
  });
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Lat', 'Long', 'Name','Marker'],
      [20.036708,-98.786502, 'GRUPO CONSTRUCTOR VADONNE SA DE CV . TANQUE : 6,000 HORIZONTAL. EQUIPO DE DESPACHO: BOMBA Y CUENTA LITROS MECANICO FR 700','blue'],
      [20.036708,-98.786502,'GRUPO CONSTRUCTOR VADONNE SA DE CV .Tanque:6,000 HORIZONTAL Equipo de despacho:BOMBA Y CUENTA LITROS MECANICO FR 700','blue'],
      [19.47235,-99.22722,'CONCRETOS LANZADOS CONSTRUCCIONES SA DE CV .Tanque:5,000 VERTICAL Equipo de despacho:BOMBA Y CUENTA LITROS MECANICO FR 800','green'],
      [19.98316,-99.27698,'SOCIEDAD COOPERATIVA DE PRODUCCION DE SERVICIOS JUAREZ S.C.L .Tanque:5,000 VERTICAL Equipo de despacho:','pink'],
      [19.96186,-98.92395,'SINGLE KRAFT & COMPANY S DE RL DE CV .Tanque:5,000 VERTICAL Equipo de despacho:','pink'],
      [20.306317,-99.916478,'TRANSPORTES ENRIQUEZ UGALDE SA DE CV .Tanque:5,000 VERTICAL Equipo de despacho:BOMBA Y CUENTA LITROS MECANICO FILL RITE 311','green'],
      [20.410421,-100.028427,'MONDRAGON LOGISTIC S DE RL DE CV .Tanque:40,000 HORIZONTAL Equipo de despacho:','green'],
      [20.10455,-98.39913,'CANACE TRANSPORTES, SA DE CV .Tanque:40,000 HORIZONTAL Equipo de despacho:','pink'],
      [21.798350,-102.283460,'TRANSPORTES TEKNICOS ESPECIALIZADOS DE CARS SA DE CV .Tanque:30,793 HORIZONTAL Equipo de despacho:BOMBA CON CUENTA LITROS MECANICO FR 310 Y BOMBA CON CUENTA LITROS DIGITAL FR 319','pink'],
      [21.798350,-102.283460,'TRANSPORTES TEKNICOS ESPECIALIZADOS DE CARS SA DE CV .Tanque:30,793 HORIZONTAL Equipo de despacho:BOMBA CON CUENTA LITROS MECANICO FR 310 Y BOMBA CON CUENTA LITROS DIGITAL FR 319','blue'],
      [20.280595,-98.348607,'MARTINIANO GONZALEZ GUTIERREZ .Tanque:30,000 VERTICAL Equipo de despacho:BOMBA Y CUENTA LITROS MECANICO FR 807','pink'],
      [20.23418,-98.21586,'GRUPO MINERO HONEY SA DE CV .Tanque:22,087 VERTICAL Equipo de despacho:BOMBA Y CUENTA LITROS MECANICO FR 700','blue'],
      [19.68642,-103.81514,'GAL GAR CONSTRUCCIONES SA DE CV .Tanque:20,000 VERTICAL Equipo de despacho:BOMBA Y CUENTA LITROS MECANICO FR','blue'],
      [19.901444,-99.14257,'LORENZO ALMAZAN HERNANDEZ .Tanque:20,000 VERTICAL Equipo de despacho:BOMBA Y CUENTA LITROS MECANICO FR 700','green'],
      [19.7878,-99.22601,'XICUCO ASFALTOS S.A. DE C.V. .Tanque:20,000 VERTICAL Equipo de despacho:BOMBA Y CUENTA LITROS MECANICO FR 700','green'],
      [19.98231,-98.85656,'SAMKER TRUCKING S DE RL DE CV .Tanque:20,000 HORIZONTAL Equipo de despacho:BOMBA Y CUENTA LITROS MECANICO FILL RITE 700','pink'],
      [20.27945,-98.35201,'ALFREDO GONZALEZ GUTIERREZ .Tanque:20,000 HORIZONTAL Equipo de despacho:BOMBA Y CUENTA LITROS MECANICO FR 700','pink'],
      [21.002061,-101.507313,'TRANSPORTADORA EGOBA, S.A. DE C.V. .Tanque:18000 HORIZONTAL Equipo de despacho:EQUIPO DE MEDICION','blue'],
      [21.002061,-101.507313,'TRANSPORTADORA EGOBA, S.A. DE C.V. .Tanque:18000 HORIZONTAL Equipo de despacho:EQUIPO DE MEDICION','green'],
      [19.77096,-98.99755,'FRANCISCA LOPEZ RAYAS .Tanque:10,000 VERTICAL Equipo de despacho:','pink'],
      [19.94788,-98.53954,'ANDRES TABOADA JIMENEZ .Tanque:10,000 HORIZONTAL Equipo de despacho:BOMBA Y CUENTA LITROS MECANICO FR 700','pink'],
      [19.54444,-98.83194,'AGREGADOS Y CONCRETOS MULTI SA DE CV .Tanque: Equipo de despacho:BOMBA Y CUENTA LITROS MECANICO FR 800','green'],
      [22.196654,-102.242655,'SOCIEDAD COOPERATIVA DE PRODUCCION Y PRESTACION DE SERVICIOS CUAUHTEMOC S.C.L. .Tanque:40,000 HORIZONTAL Equipo de despacho:BOMBA Y CUENTA LITROS DIGITAL FILL RITE FR310','pink'],
      [16.834201,-95.024719,'SOCIEDAD COOPERATIVA DE PRODUCCION Y PRESTACION DE SERVICIOS CUAUHTEMOC S.C.L. .Tanque:40,000 HORIZONTAL Equipo de despacho:DISPENSARIO SELF SERVICE METER LITE (PIUSSI)','pink'],
      [19.20119, -96.26546,'SU TRANSPORTE SA DE CV .Tanque:32,000 AUTOTANQUE Equipo de despacho:BOMBA Y CUENTA LITROS DIGITAL FILL RITE FR310','pink'],
      [21.84356, -102.28831,'SERVICIO DE PAN AMERICANO DE PROTECCION SA DE CV .Tanque:20,000 VERTICAL Equipo de despacho:','pink']
    ]);
        var url = 'https://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/';
      var options = {
    zoomLevel: 6,
    showTooltip: true,
    showInfoWindow: true,
    useMapTypeControl: true,
    icons: {
      blue: {
        normal:   url + 'Map-Marker-Ball-Azure-icon.png',
        selected: url + 'Map-Marker-Ball-Right-Azure-icon.png'
      },
      green: {
        normal:   url + 'Map-Marker-Ball-Chartreuse-icon.png',
        selected: url + 'Map-Marker-Ball-Right-Chartreuse-icon.png'
      },
      pink: {
        normal:   url + 'Map-Marker-Ball-Pink-icon.png',
        selected: url + 'Map-Marker-Ball-Right-Pink-icon.png'
      }
    }
  };
   var map = new google.visualization.Map(document.getElementById('map_div'));
   map.draw(data, options);
}
