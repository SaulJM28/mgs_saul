$(document).ready(function() {
    var table = $("#tableCPTimbrado").DataTable({
        scrollY: "250px",
        scrollCollapse: false,
        responsive: true,
        "scrollCollapse": true,
        paging: false,
        stateSave: true,
        lengthMenu: [
            [10, 20, 50, -1],
            [10, 20, 50, "Todos"],
        ],
        dom: '<"float-left"l><"float-right"f>ti<"float-right"p><"clearfix"><br/>',
        responsive: false,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
        },
        order: [
            [0, "desc"]
        ],
        select: false,
    });
});


function LimpiarCache() {
      localStorage.clear();
}