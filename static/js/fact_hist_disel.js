$(document).ready(function () {
    $("#sidebarCollapse").on("click", function () {
      $("#sidebar, #content").toggleClass("active");
      $(".collapse.in").toggleClass("in");
      $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });
//Obtener fecha del primer dia de mes y el ultimo, filtro default 
fhi = moment(obtenerFechaInicioDeMes()).format('YYYY-MM-DD');
fhf = moment(obtenerFechaFinDeMes()).format('YYYY-MM-DD');
//ajax que trae los datos de la tabla por default
$("#periodoFechasGracoil").html("Periodo del: " + fhi + " al " + fhf + "");
    $.ajax({
        type: "GET",
        url: "http://192.168.100.33/apiGrac/facturacion/hfacturascte.php?nik=grac)"+fhi+")"+fhf+"",
        dataType: "json",
        success: function (data) {
            var html = '';
            $('#tbList').empty();
            if (data.length > 0) {
                $.each(data, function (i) {
                    {
                     var preciUnitario =   Number(data[i].PU).toFixed(2);
                     var cantidad = Number(data[i].QTY).toFixed(2);
                     var TotalFact = Number(data[i].DocTotal).toFixed(2);
                     var saldo = Number(data[i].SALDO).toFixed(2);
                     var fecha_ven = data[i].DocDueDate;
                     const fecha_hoy = new Date();
                     var fecha_ven_mod = moment(fecha_ven).format('YYYY-MM-DD');              
                     var fecha_hoy_mod = moment(fecha_hoy).format('YYYY-MM-DD');
                     if(saldo >= 0){
                        data.status = "Pagada";
                        var status = data.status;
                        var color = "#E4FFB8";
                    } 
                    if((saldo > 0) && (fecha_ven_mod >= fecha_hoy_mod) ){
                        data.status = "En Tiempo";
                        var status = data.status;
                        var color = "#FFFBB8";
                    } 
                    if((saldo > 0) && (fecha_ven_mod < fecha_hoy_mod) ){
                        data.status = "Vencida";
                        var status = data.status;
                        var color = "#FFAAAA";
                    }
                        html = ' <tr style="background-color:'+ color +'"> ' +
                            '<td>' + data[i].CardCode + '</td>' +
                            '<td>' + data[i].CardName + '</td>' +
                            '<td>' + data[i].ItemCode + '</td>' +
                            '<td>' + data[i].ShipToCode + '</td>' +
                            '<td>' + data[i].U_REMISION + '</td>' +
                            '<td>' + data[i].DocNum + '</td>' +
                            '<td>' + moment(data[i].DocDate).format('YYYY-MM-DD') + '</td>' +
                            '<td>' + moment(data[i].DocDueDate).format('YYYY-MM-DD') + '</td>' +
                            '<td>' + data[i].Dias_Atraso + '</td>' +
                            '<td>$ ' + number_format_js(preciUnitario,2,'.',',') + '</td>' +
                            '<td>$ ' + number_format_js(cantidad,2,'.',',') + '</td>' +
                            '<td>$ ' + number_format_js(TotalFact,2,'.',',')  + '</td>' +
                            '<td>$ ' + number_format_js(saldo,2,'.',',') + '</td>' +
                            '<td>' + status + '</td>' +
                            '<td>' + data[i].U_GRUPO_SN + '</td>' +
                            ' </tr>';
                        $('#datosTablaGracoil').append(html);
                    }
                });
             $('#myTableGracoil').DataTable({
                fixedHeader: true,
                "scrollX": true,
                "dom": 'l<br><br><br>Bfrtip',
                "responsive": true,
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                },
                "order": [
                    [1, "asc"]
                ],
                aLengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ], 
                buttons: [{
                        extend: 'excelHtml5',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn btn-success'
                    },
                    {
                        extend: 'pdfHtml5',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn btn-danger'
                    },
                ]
                });
            }
        },
        failure: function (response) {
            console.log(response.responseText);
        },
        error: function (response) {
            console.log(response.responseText);
        }
    });
  });


  function number_format_js(number, decimals, dec_point, thousands_point) {

    if (number == null || !isFinite(number)) {
        throw new TypeError("number is not valid");
    }

    if (!decimals) {
        var len = number.toString().split('.').length;
        decimals = len > 1 ? len : 0;
    }

    if (!dec_point) {
        dec_point = '.';
    }

    if (!thousands_point) {
        thousands_point = ',';
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
	return new Date(fechaFin.getFullYear(), fechaFin.getMonth() + 1, fechaFin.getDate());
};


function filtrar_dato(){
   
        var fif = document.getElementById("fecha_inicio_filtro").value;
        var fff = document.getElementById("fecha_fin_filtro").value;     

        $.ajax({
            url: "ruta_de_mi_archivo_php_donde_haremos_la_consulta.php",
            type: "POST",
            data: {veruser:1},
            success: function(data) {
                     // En caso de que se ejecute
                     $('#mi_tabla > tbody').html(data);
            }
     });
        
    }
  

function generar_tabla(){
    $('#myTableFiltradaGracoil').DataTable({
        fixedHeader: true,
        "scrollX": true,
        "scrollY": true,
        "dom": 'l<br><br><br>Bfrtip',
        "responsive": true,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        },
        "order": [
            [1, "asc"]
        ],
        buttons: [{
                extend: 'excelHtml5',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'pdfHtml5',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-danger'
            },
        ]
        });
}

  