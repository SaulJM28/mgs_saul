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
    $("#toggleAlta").on("click", function () {
      $("#alta").toggle();
      $("#lista").hide();
   
    });
  
    $("#toggleLista").on("click", function () {
      $("#lista").toggle();
      $("#alta").hide();
     
    });
 
  
 
    
    var table = $("#tableLista").DataTable();

  

  
  
  });
  
