$(document).ready(function () {
  //funcion para el menu lateral se oculte
  $("#sidebarCollapse").on("click", function () {
    $("#sidebar, #content").toggleClass("active");
    $(".collapse.in").toggleClass("in");
    $("a[aria-expanded=true]").attr("aria-expanded", "false");
  });

  $("#tablaListaPesoTalla tfoot th").each(function () {
    var title = $(this).text();
    $(this).html(
      '<input type="text" placeholder="Filtrar.. ' + title + ' " />'
    );
  });

  var table = $("#tablaListaPesoTalla").DataTable({
    scrollX: true,
    scrollY: "525px",
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
        className: "btn-excel",
      },
      {
        extend: "csvHtml5",
        title: "H. Facturas Gracoil",
        text: '<i class="fa-solid fa-file-csv"></i>',
        className: "btn-csv",
      },
      {
        extend: "pdfHtml5",
        title: "H. Facturas Gracoil",
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
        title: "H. Facturas Gracoil",
        className: "btn-imprimir",
        text: '<i class="fa-solid fa-print"></i>',
        footer: "true",
        exportOptions: {
          columns: ":visible",
        },
      },
      {
        extend: "copy",
        title: "H. Facturas Gracoil",
        className: "btn-copiar",
        text: '<i class="fas fa-copy"></i>',
      },
      "colvis",
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

var table = $("#tablaListaPesoTallaFil").DataTable();

function tabla_filtrada() {
  let id_ubi = document.getElementById("ubicacion").value;
  let fi = document.getElementById("fecha_inicio_filtro").value;
  let ff = document.getElementById("fecha_fin_filtro").value;

  if (id_ubi == "") {
    alert("Seleccione una ubicación");
  } else if (fi == "") {
    alert("Seleccione una fecha de inicio");
  } else if (ff == "") {
    alert("Seleccione una fecha fin");
  } else {
    document.getElementById("allDatosPesoTalla").innerHTML = "";
    var y = document.getElementById("filterDatosPesoTalla");
    y.style.display = "block";
    /*  $("#periodoFechasGracoil").html("Empresa: " + emp + " rango de fecha " + fif + " al " + fff); */
    table.destroy();

    $.ajax({
      type: "POST",
      url: "./back/get_peso_talla_filtrado.php",
      data: {
        id_ubic: id_ubi,
        fini: fi,
        ffin: ff,
      },
      dataType: "json",
      success: function (data) {
        var html = "";
        $("#datostablaListaPesoTallaFil").empty();
        if (data.length > 0) {
          $.each(data, function (i) {
            {
              console.log(data);
              if (data[i].IMC < 18.5) {
                $texto = "Peso Bajo";
              } else if (data[i].IMC >= 18.5 && data[i].IMC <= 24.9) {
                $texto = "Normal";
              } else if (data[i].IMC >= 25 && data[i].IMC <= 29.9) {
                $texto = "SobrePeso";
              } else if (data[i].IMC >= 30) {
                $texto = "Obesidad";
              }

              html =
                " <tr> " +
                "<td>" +
                data[i].nom +
                " " +
                data[i].ap1 +
                " " +
                data[i].ap2 +
                "</td>" +
                "<td>" +
                data[i].edad +
                "</td>" +
                "<td>" +
                data[i].peso +
                "</td>" +
                "<td>" +
                data[i].talla +
                "</td>" +
                "<td>" +
                data[i].cintura +
                "</td>" +
                "<td>" +
                data[i].cadera +
                "</td>" +
                "<td>" +
                data[i].T_A +
                "</td>" +
                "<td>" +
                data[i].glucosa +
                "</td>" +
                "<td>" +
                data[i].IMC +
                "</td>" +
                "<td> " +
                $texto +
                "</td>" +
                "<td> " +
                data[i].porc_gra +
                "</td>" +
                "<td> " +
                data[i].porc_musc +
                "</td>" +
                "<td> " +
                data[i].MA +
                "</td>" +
                "<td>" +
                data[i].fecha_regis +
                "</td>" +
                "<td>" +
                data[i].nom_ubic +
                "</td>" +
                "<td>" +
                "<div class='btn-group' role='group'> <button id='btnGroupDrop1' type='button' class='btn btn-info btn-sm ' data-bs-toggle='dropdown' aria-expanded='false'><i class='fas fa-list'></i></button><ul class='dropdown-menu' aria-labelledby='btnGroupDrop1'><li><a type='button' class='dropdown-item' title='Editar :  " +
                data[i].nom +
                "' onclick='get_datos_edit(" +
                data[i].id_rpt +
                ")'><i class='fa fa-edit'></i> Editar</a></li><li><a type='button' class='dropdown-item' data-bs-toggle='modal' data-bs-target='#staticBackdrop' title='Eliminar:  " +
                data[i].nom +
                "' onclick='get_datos_elim(" +
                data[i].id_rpt +
                ")'><i class='fa-solid fa-trash'></i> Eliminar</a></li></ul></div>" +
                "</td></tr>";
              $("#datostablaListaPesoTallaFil").append(html);
            }
          });

          $("#tablaListaPesoTallaFil tfoot th").each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Filtrar.." />');
          });

          table = $("#tablaListaPesoTallaFil").DataTable({
            scrollX: true,
            scrollY: "525px",
            scrollCollapse: false,
            paging: true,
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
                title: "Lista Peso Talla",
                text: '<i class="fas fa-file-excel"></i>',
                className: "btn btn-primary",
              },
              {
                extend: "csvHtml5",
                title: "Lista Peso Talla",
                text: '<i class="fa-solid fa-file-csv"></i>',
                className: "btn btn-default btn-sm",
              },
              {
                extend: "pdfHtml5",
                title: "Lista Peso Talla",
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
                title: "Lista Peso Talla",
                className: "btn btn-default",
                text: '<i class="fa-solid fa-print"></i>',
                footer: "true",
                exportOptions: {
                  columns: ":visible",
                },
              },
              {
                extend: "copy",
                title: "Lista Peso Talla",
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
          $("#tablaListaPesoTallaFil tfoot th").each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Filtrar.." />');
          });

          table = $("#tablaListaPesoTallaFil").DataTable({
            scrollX: true,
            scrollY: "525px",
            scrollCollapse: false,
            paging: true,
            responsive: true,
            stateSave: true,
            scrollCollapse: true,
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
        }
      },
      failure: function (response) {
        console.log(response.responseText);
      },
      error: function (response) {},
    });
  }
}

function get_datos_edit(id) {
  setTimeout(() => {
    window.location.href = `edit_peso_talla.php?id=${id}`;
  }, 100);
}

async function get_datos_elim(id) {
  $.ajax({
    type: "POST",
    url: "./back/get_peso_talla_filtradoById.php",
    data: {
      id_rtp: id,
    },
    async: true,
    beforeSend: function () {},
    success: function (response) {
      if (response != "noData") {
        let info = JSON.parse(response);
        document.getElementById("id_rpt").value = info.id_rpt;
        document.getElementById("nombre").value =
          info.nom + " " + info.ap1 + " " + info.ap2;
        document.getElementById("fech_regis").value = info.fecha_regis;
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

function eliminar_registro() {
  let id = document.getElementById("id_rpt").value;
  $.ajax({
    type: "POST",
    url: "./back/delete_peso_talla.php",
    data: {
      id_rpt: id,
    },
    async: true,
    beforeSend: function () {},
    success: function (response) {
      if (!response) {
        var opcion = confirm("Registro eliminado con éxito");
        if (opcion == true) {
          setTimeout(() => {
            window.location.href = `lista_peso_talla.php`;
          }, 100);
        } else {
          setTimeout(() => {
            window.location.href = `lista_peso_talla.php`;
          }, 100);
        }
        
      } else {
        alert("ocurrio un problema al intentar borrar el registro");
      }
    },
    error: function (error) {
      console.log(error);
    },
  });
}
