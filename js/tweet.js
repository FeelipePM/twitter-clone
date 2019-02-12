$(document).ready(function() {
  $("#btn_tweet").click(function() {
    if ($("#text_tweet").val().length > 0) {
      $.ajax({
        url: "inclui_tweet.php",
        method: "POST",
        data: $("#form_tweet").serialize(),
        success: function(data) {
          console.log(data);
        }
      });
    }
  });
});
