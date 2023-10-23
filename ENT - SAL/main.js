$(document).ready(function () {
  $("ul.tabs li a:first").addClass("active");
  $(".secciones article").hide();
  $(".secciones article:first").show();

  $("ul.tabs li a").click(function () {
    $("ul.tabs li a").removeClass("active");
    $(this).addClass("active");
    $(".secciones article").hide();

    var activeTab = $(this).attr("href");
    $(activeTab).show();
    return false;
  });
});

function recibir() {
  var valor = document.querySelector("#proveedor").value;
  console.log(valor);
  document.querySelector("#codigo").value = valor;
}
