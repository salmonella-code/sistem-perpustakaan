$(document).ready(function () {
  $("#sidebarCollapse").on("click", function () {
    $("#sidebar").toggleClass("active");
    $(this).toggleClass("active");
  });

  $("#dataTable").DataTable({
    pageLength: 5,
    lengthMenu: [5, 10, 25, 50, 75, 100],
  });
});
