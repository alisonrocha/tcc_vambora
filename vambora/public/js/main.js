
//Ajax Mensagens Grupo
function mensagem() {
  $.ajax({
    type: "POST",
    url: "mensagem.php",
    data: $('.form').serialize(),   
    success: function(data) {
      $('#mensagem').html(data);
    }
  });
}

