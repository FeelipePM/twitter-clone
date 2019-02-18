$(document).ready(function() {
  $("#btn_procurar_pessoa").click(function() {
    if ($("#nome_pessoa").val().length > 0) {
      $.ajax({
        url: "get_pessoas.php",
        method: "POST",
        data: $("#form_procurar_pessoas").serialize(),
        success: function(data) {
          $("#pessoas").html(data);

          $(".btn_seguir").click(function() {
            var id_usuario = $(this).data("id_usuario");

            $.ajax({
              url: "seguir.php",
              method: "POST",
              data: { seguir_id_usuario: id_usuario },
              success: function(data) {
                console.log("Requisição Efetuada com Sucesso!");
              }
            });
          });
          $(".btn_deixar_seguir").click(function() {
            var id_usuario = $(this).data("id_usuario");

            $.ajax({
              url: "deixar_seguir.php",
              method: "POST",
              data: { deixar_seguir_id_usuario: id_usuario },
              success: function(data) {
                console.log("Requisição Removida com Sucesso!");
              }
            });
          });
        }
      });
    }
  });
});
