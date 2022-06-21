$(document).ready(function () {
    $("#sidebarCollapse").on("click", function () {
      $("#sidebar, #content").toggleClass("active");
      $(".collapse.in").toggleClass("in");
      $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });
  
    //Obtener fecha del primer dia de mes y el ultimo, filtro default
    fhi = moment(obtenerFechaInicioDeMes()).format("YYYY-MM-DD");
    fhf = moment(obtenerFechaFinDeMes()).format("YYYY-MM-DD");
    //ajax que trae los datos de la tabla por default
    $("#periodoFechas").html("General, Periodo del: " + fhi + " al " + fhf + "");

    $("#tableCEFC tfoot th").each(function () {
        var title = $(this).text();
        $(this).html(
          '<input type="text" placeholder="Filtrar.. ' + title + ' " />'
        );
      });

      var table = $("#tableCEFC").DataTable({
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
          $(api.column(7).footer()).html(api.column(7, { page: "current" }).data().sum().toLocaleString("es-MX"));
          $(api.column(11).footer()).html(api.column(11, { page: "current" }).data().sum().toLocaleString("es-MX"));
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
  
  function number_format_js(number, decimals, dec_point, thousands_point) {
    if (number == null || !isFinite(number)) {
      throw new TypeError("number is not valid");
    }
  
    if (!decimals) {
      var len = number.toString().split(".").length;
      decimals = len > 1 ? len : 0;
    }
  
    if (!dec_point) {
      dec_point = ".";
    }
  
    if (!thousands_point) {
      thousands_point = ",";
    }
  
    number = parseFloat(number).toFixed(decimals);
  
    number = number.replace(".", dec_point);
  
    var splitNum = number.split(dec_point);
    splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
    number = splitNum.join(dec_point);
  
    return number;
  }
  
  const obtenerFechaInicioDeMes = () => {
    const fechaInicio = new Date();
    // Iniciar en este año, este mes, en el día 1
    return new Date(fechaInicio.getFullYear(), fechaInicio.getMonth(), 1);
  };
  
  const obtenerFechaFinDeMes = () => {
    const fechaFin = new Date();
    // Iniciar en este año, el siguiente mes, en el día 0 (así que así nos regresamos un día)
    return new Date(
      fechaFin.getFullYear(),
      fechaFin.getMonth(),
      fechaFin.getDate()
    );
  };
  
  //var table = $("#myTableFiltradaGracoil").DataTable();
  
  function filtrar_dato() {
    var fif = document.getElementById("fecha_inicio_filtro").value;
    var fff = document.getElementById("fecha_fin_filtro").value;

  
    
    if (fif == ""   ) {
      alert("Fecha incio esta vacia");
    } else if ((fff == "")){
      alert("Fecha fin esta vacia");
    }else{
        $("#periodoFechas").html("");
        $("#peridoFechasFiltradas").html("Perido de fechas filtradas de : " + fif + " al " + fff + "");
  }
  
  }
  