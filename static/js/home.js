$(document).ready(function () {
    $("#sidebar").mCustomScrollbar({
      theme: "minimal",
    });

    $("#precios_card").on("click", function () {
      $("#precios_card_content").toggle("slow");
      $("#inventarios_card_content").hide("slow");
      $("#facturacion_card_content").hide("slow");
      $("#compras_card_content").hide("slow");
      $("#cobranza_card_content").hide("slow");
    });

    $("#inventarios_card").on("click", function () {
      $("#inventarios_card_content").toggle("slow");
      $("#precios_card_content").hide("slow");
      $("#facturacion_card_content").hide("slow");
      $("#compras_card_content").hide("slow");
      $("#cobranza_card_content").hide("slow");
    });

    $("#facturacion_card").on("click", function () {
      $("#facturacion_card_content").toggle("slow");
      $("#precios_card_content").hide("slow");
      $("#inventarios_card_content").hide("slow");
      $("#compras_card_content").hide("slow");
      $("#cobranza_card_content").hide("slow");
    });
    $("#compras_card").on("click", function () {
      $("#compras_card_content").toggle("slow");
      $("#precios_card_content").hide("slow");
      $("#inventarios_card_content").hide("slow");
      $("#facturacion_card_content").hide("slow");
      $("#cobranza_card_content").hide("slow");
    });
    $("#cobranza_card").on("click", function () {
      $("#cobranza_card_content").toggle("slow");
      $("#precios_card_content").hide("slow");
      $("#inventarios_card_content").hide("slow");
      $("#facturacion_card_content").hide("slow");   
      $("#compras_card_content").hide("slow");
    });
    //modulo 2
    $("#bancos_card").on("click", function () {
      $("#bancos_card_content").toggle("slow");
      $("#kpis_card_content").hide("slow");
      $("#contabilidad_card_content").hide("slow");
      $("#rh_card_content").hide("slow");
      $("#transportes_card_content").hide("slow");
      $("#TI_card_content").hide("slow");
      $("#ventas_card_content").hide("slow");
    });
    $("#contabilidad_card").on("click", function () {
      $("#contabilidad_card_content").toggle("slow");
      $("#bancos_card_content").hide("slow");
      $("#kpis_card_content").hide("slow");
      $("#rh_card_content").hide("slow");
      $("#transportes_card_content").hide("slow");
      $("#TI_card_content").hide("slow");
      $("#ventas_card_content").hide("slow");
    });
    $("#kpis_card").on("click", function () {
      $("#kpis_card_content").toggle("slow");
      $("#bancos_card_content").hide("slow");
      $("#contabilidad_card_content").hide("slow");
      $("#rh_card_content").hide("slow");
      $("#transportes_card_content").hide("slow");
      $("#TI_card_content").hide("slow");
      $("#ventas_card_content").hide("slow");
    });
    $("#rh_card").on("click", function () {
      $("#rh_card_content").toggle("slow");
      $("#bancos_card_content").hide("slow");
      $("#contabilidad_card_content").hide("slow");
      $("#kpis_card_content").hide("slow");
      $("#transportes_card_content").hide("slow");
      $("#TI_card_content").hide("slow");
      $("#ventas_card_content").hide("slow");
    });
    $("#transportes_card").on("click", function () {
      $("#transportes_card_content").toggle("slow");
      $("#bancos_card_content").hide("slow");
      $("#contabilidad_card_content").hide("slow");
      $("#kpis_card_content").hide("slow");
      $("#rh_card_content").hide("slow");
      $("#TI_card_content").hide("slow");
      $("#ventas_card_content").hide("slow");
    });
    $("#TI_card").on("click", function () {
      $("#TI_card_content").toggle("slow");
      $("#bancos_card_content").hide("slow");
      $("#contabilidad_card_content").hide("slow");
      $("#kpis_card_content").hide("slow");
      $("#rh_card_content").hide("slow");
      $("#transportes_card_content").hide("slow");
      $("#ventas_card_content").hide("slow");
    });
    $("#ventas_card").on("click", function () {
      $("#ventas_card_content").toggle("slow");
      $("#bancos_card_content").hide("slow");
      $("#contabilidad_card_content").hide("slow");
      $("#kpis_card_content").hide("slow");
      $("#rh_card_content").hide("slow");
      $("#transportes_card_content").hide("slow");
      $("#TI_card_content").hide("slow");
    });
    //Modulo 3
    $("#utilidades_card").on("click", function () {
      $("#utilidades_card_content").toggle("slow");
    });
    $("#sidebarCollapse").on("click", function () {
      $("#sidebar, #content").toggleClass("active");
      $(".collapse.in").toggleClass("in");
      $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });
  });