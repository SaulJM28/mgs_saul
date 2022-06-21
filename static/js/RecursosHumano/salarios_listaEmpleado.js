$(document).ready(function () {
  //funcion para el menu lateral se oculte
  $("#sidebarCollapse").on("click", function () {
    $("#sidebar, #content").toggleClass("active");
    $(".collapse.in").toggleClass("in");
    $("a[aria-expanded=true]").attr("aria-expanded", "false");
  });
});

var table = $("#tableSalariosEmpleado").DataTable();

function obtner_datos_empleado() {
  let id = document.getElementById("empleado").value;
  let nom;

  var windowWidth = window.innerWidth;

  if(windowWidth < 768){
    scrollX = true;
  }else{
    scrollX = false;
  }

  if (typeof id === "undefined" || id === "") {
  
  } else {
    table.destroy();
    $.ajax({
      type: "POST",
      url: "../Salarios/back/get_salariosEmpleado.php",
      data: {
        id_emp: id,
      },
      async: true,
      beforeSend: function () {},
      success: function (response) {
        if (response != "noData") {
          let data = JSON.parse(response);
          var html = "";
          $("#datosTabla").empty();
          $.each(data, function (i) {
            {
                nom = data[0].nom;
              html =
                " <tr> " +
                "<td>" + data[i].nom + " " + data[i].ap1 + " " + data[i].ap2 +"</td>" +
                "<td>$" + number_format_js(data[i].sueldo_anterior, ".", ",") +"</td>" +
                "<td>" + data[i].porcentaje +"%</td>" +
                "<td>$" + number_format_js(data[i].nuevo_sueldo, ".", ",") + "</td>" + 
                "<td>$"+ number_format_js((data[i].nuevo_sueldo-data[i].sueldo_anterior), ".", ",") +"</td>" +
                "<td>" + data[i].fecha_regi + "</td>" 
                "</tr>";
              $("#datosTabla").append(html);
            }
          });

          $("#tableSalariosEmpleado tfoot th").each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Filtrar.." />');
          });

          table = $("#tableSalariosEmpleado").DataTable({
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
                title: "Aumento de sueldo " + nom,
                text: '<i class="fas fa-file-excel"></i>',
                className: "btn-excel",
              },
              {
                extend: "csvHtml5",
                title: "Aumento de sueldo " + nom,
                text: '<i class="fa-solid fa-file-csv"></i>',
                className: "btn-csv",
              },
              {
                extend: "pdfHtml5",
                title: "Aumento de sueldo " + nom,
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
                title: "Aumento de sueldo " + nom,
                className: "btn-imprimir",
                text: '<i class="fa-solid fa-print"></i>',
                footer: "true",
                exportOptions: {
                  columns: ":visible",
                },
              },
              {
                extend: "copy",
                title: "Aumento de sueldo " + nom,
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
                className: "btn-imprimir",
                title: "Aumento de sueldo " + nom,
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
          let dataUsuarios = "No hay registros con ese ID";
          //console.log(dataUsuarios);
        }
      },
      error: function (error) {
        console.log(error);
      },
    });
  }
}


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
