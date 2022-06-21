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
  $("#periodoFechasGracoil").html(
    "General Periodo del: " + fhi + " al " + fhf + ""
  );
  $.ajax({
    type: "GET",
    url:
      "http://192.168.100.33/apiGrac/facturacion/hfacturascte.php?nik=grac)" +
      fhi +
      ")" +
      fhf +
      "",
    dataType: "json",
    success: function (data) {
      var html = "";
      $("#tbList").empty();
      if (data.length > 0) {
        $.each(data, function (i) {
          {
            var preciUnitario = Number(data[i].PU).toFixed(2);
            var cantidad = Number(data[i].QTY).toFixed(2);
            var TotalFact = Number(data[i].DocTotal).toFixed(2);
            var saldo = Number(data[i].SALDO).toFixed(2);
            var fecha_ven = data[i].DocDueDate;
            const fecha_hoy = new Date();
            var fecha_ven_mod = moment(fecha_ven).format("YYYY-MM-DD");
            var fecha_hoy_mod = moment(fecha_hoy).format("YYYY-MM-DD");
            if (saldo >= 0) {
              data.status = "Pagada";
              var status = data.status;
              var color = "#E4FFB8";
            }
            if (saldo > 0 && fecha_ven_mod >= fecha_hoy_mod) {
              data.status = "En Tiempo";
              var status = data.status;
              var color = "#FFFBB8";
            }
            if (saldo > 0 && fecha_ven_mod < fecha_hoy_mod) {
              data.status = "Vencida";
              var status = data.status;
              var color = "#FFAAAA";
            }
            html =
              " <tr> " +
              "<td>" +
              data[i].CardCode +
              "</td>" +
              "<td>" +
              data[i].CardName +
              "</td>" +
              "<td>" +
              data[i].ItemCode +
              "</td>" +
              "<td>" +
              data[i].ShipToCode +
              "</td>" +
              "<td>" +
              data[i].U_REMISION +
              "</td>" +
              "<td>" +
              data[i].DocNum +
              "</td>" +
              "<td>" +
              moment(data[i].DocDate).format("YYYY-MM-DD") +
              "</td>" +
              "<td>" +
              moment(data[i].DocDueDate).format("YYYY-MM-DD") +
              "</td>" +
              "<td>" +
              data[i].Dias_Atraso +
              "</td>" +
              "<td>" +
              number_format_js(preciUnitario, 2, ".", ",") +
              "</td>" +
              "<td>" +
              number_format_js(cantidad, 2, ".", ",") +
              "</td>" +
              "<td>" +
              number_format_js(TotalFact, 2, ".", ",") +
              "</td>" +
              "<td>" +
              number_format_js(saldo, 2, ".", ",") +
              "</td>" +
              '<td><p style="background-color:' +
              color +
              '; border-radius: 8px; text-align: center;">' +
              status +
              "</p></td>" +
              "<td>" +
              data[i].U_GRUPO_SN +
              "</td>" +
              " </tr>";
            $("#datosTablaGracoil").append(html);
          }
        });

        $("#myTableGracoil tfoot th").each(function () {
          var title = $(this).text();
          $(this).html(
            '<input type="text" placeholder="Filtrar.. ' + title + ' " />'
          );
        });

        var table = $("#myTableGracoil").DataTable({
          scrollX: true,
         scrollY: "525px",
          scrollCollapse: false,
          responsive: true,
          "scrollCollapse": true,
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
          drawCallback: function () {
            //alert("La tabla se está recargando");
            var api = this.api();
            $(api.column(10).footer()).html(
              api
                .column(10, { page: "current" })
                .data()
                .sum()
                .toLocaleString("es-MX")
            );
            $(api.column(11).footer()).html(
              api
                .column(11, { page: "current" })
                .data()
                .sum()
                .toLocaleString("es-MX")
            );
            $(api.column(12).footer()).html(
              api
                .column(12, { page: "current" })
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
      }
    },
    failure: function (response) {
      console.log(response.responseText);
    },
    error: function (response) {
      console.log(response.responseText);
    },
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

var table = $("#myTableFiltradaGracoil").DataTable();

function filtrar_dato() {
  var fif = document.getElementById("fecha_inicio_filtro").value;
  var fff = document.getElementById("fecha_fin_filtro").value;
  var emp = document.getElementById("empresa_filtro").value;

  if (fif == ""   ) {
    alert("Fecha incio esta vacia");
  } else if ((fff == "")){
    alert("Fecha fin esta vacia");
  }else if(emp == ""){
    alert("Le empresa esta vacia");
  }else{
    document.getElementById("allDatosGracoil").innerHTML = "";
    var y = document.getElementById("filterDatosGracoil");
    y.style.display = "block";
    $("#periodoFechasGracoil").html("Empresa: " + emp + " rango de fecha " + fif + " al " + fff);
    table.destroy();
    $.ajax({
      type: "GET",
      url:
        "http://192.168.100.33/apiGrac/facturacion/hfacturascte.php?nik="+emp+")"+fif+")"+fff+"",
      dataType: "json",
      success: function (data) {
        var html = "";
        $("#datosTablaGracoilFiltrados").empty();
        if (data.length > 0) {
          $.each(data, function (i) {
            {
              var preciUnitario = Number(data[i].PU).toFixed(2);
              var cantidad = Number(data[i].QTY).toFixed(2);
              var TotalFact = Number(data[i].DocTotal).toFixed(2);
              var saldo = Number(data[i].SALDO).toFixed(2);
              var fecha_ven = data[i].DocDueDate;
              const fecha_hoy = new Date();
              var fecha_ven_mod = moment(fecha_ven).format("YYYY-MM-DD");
              var fecha_hoy_mod = moment(fecha_hoy).format("YYYY-MM-DD");
              if (saldo >= 0) {
                data.status = "Pagada";
                var status = data.status;
                var color = "#E4FFB8";
              }
              if (saldo > 0 && fecha_ven_mod >= fecha_hoy_mod) {
                data.status = "En Tiempo";
                var status = data.status;
                var color = "#FFFBB8";
              }
              if (saldo > 0 && fecha_ven_mod < fecha_hoy_mod) {
                data.status = "Vencida";
                var status = data.status;
                var color = "#FFAAAA";
              }
              html =
                " <tr> " +
                "<td>" +
                data[i].CardCode +
                "</td>" +
                "<td>" +
                data[i].CardName +
                "</td>" +
                "<td>" +
                data[i].ItemCode +
                "</td>" +
                "<td>" +
                data[i].ShipToCode +
                "</td>" +
                "<td>" +
                data[i].U_REMISION +
                "</td>" +
                "<td>" +
                data[i].DocNum +
                "</td>" +
                "<td>" +
                moment(data[i].DocDate).format("YYYY-MM-DD") +
                "</td>" +
                "<td>" +
                moment(data[i].DocDueDate).format("YYYY-MM-DD") +
                "</td>" +
                "<td>" +
                data[i].Dias_Atraso +
                "</td>" +
                "<td> " +
                number_format_js(preciUnitario, 2, ".", ",") +
                "</td>" +
                "<td> " +
                number_format_js(cantidad, 2, ".", ",") +
                "</td>" +
                "<td> " +
                number_format_js(TotalFact, 2, ".", ",") +
                "</td>" +
                "<td> " +
                number_format_js(saldo, 2, ".", ",") +
                "</td>" +
                '<td><p style="background-color:' +
                color +
                '; border-radius: 8px; text-align: center;">' +
                status +
                "</p></td>" +
                "<td>" +
                data[i].U_GRUPO_SN +
                "</td>" +
                " </tr>";
              $("#datosTablaGracoilFiltrados").append(html);
            }
          });

          $("#myTableFiltradaGracoil tfoot th").each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Filtrar.." />');
          });

          table = $("#myTableFiltradaGracoil").DataTable({
            scrollX: true,
            scrollY: "525px",
            scrollCollapse: false,
            paging: true,
            responsive: true,
            "scrollCollapse": true,
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
            drawCallback: function () {
              //alert("La tabla se está recargando");
              var api = this.api();
              $(api.column(10).footer()).html(
                api
                  .column(10, { page: "current" })
                  .data()
                  .sum()
                  .toLocaleString("es-MX")
              );
              $(api.column(11).footer()).html(
                api
                  .column(11, { page: "current" })
                  .data()
                  .sum()
                  .toLocaleString("es-MX")
              );
              $(api.column(12).footer()).html(
                api
                  .column(12, { page: "current" })
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
        } else {
          alert("No se encontro informacion con esos parametros");
          $("#myTableFiltradaGracoil tfoot th").each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Filtrar.." />');
          });

          table = $("#myTableFiltradaGracoil").DataTable({
            scrollX: true,
            scrollY: "525px",
            scrollCollapse: false,
            paging: true,
            responsive: true,
            stateSave: true,
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
              $(api.column(10).footer()).html(
                api
                  .column(10, { page: "current" })
                  .data()
                  .sum()
                  .toLocaleString("es-MX")
              );
              $(api.column(11).footer()).html(
                api
                  .column(11, { page: "current" })
                  .data()
                  .sum()
                  .toLocaleString("es-MX")
              );
              $(api.column(12).footer()).html(
                api
                  .column(12, { page: "current" })
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
        }
      },
      failure: function (response) {
        console.log(response.responseText);
      },
      error: function (response) {},
    });
  


}

}
