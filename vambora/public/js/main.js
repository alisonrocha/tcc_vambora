
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

$( document ).ready(function() {
    function atualizaNumeroGrupoCadastrados(id) {
      $.get("/numeroGrupoCadastrados/" + id)
        .done(
         function(response) {
            var numeroGrupoCadastrados = $(".numeroGrupoCadastrados");

            numeroGrupoCadastrados.each(function() {
              $(this).text("Grupos Cadastrados " + response.num_grupos_cadastrados);
            });
         }
        )
        .fail(
         function() {
           console.log("Erro ao atualizar o número de grupos cadastrados.");
         }
      );
    }

    function atualizaNumeroGrupoParticipando(id) {
      $.get("/numeroGrupoParticipando/" + id)
        .done(
         function(response) {
            var numeroGrupoParticipando = $(".numeroGrupoParticipando");

            numeroGrupoParticipando.each(function() {
              $(this).text("Grupos Participando " + response.num_grupos_participando);
            });
         }
        )
        .fail(
         function() {
           console.log("Erro ao atualizar o número de grupos participando.");
         }
      );
    }

    function atualizaNotificacoes(id) {
      $.get("/retornaNotificacoes/" + id)
        .done(
         function(response) {
            var notificacoes_container = $(".notificacoes_container");

            var notificacoes = [];

            $(response).each(function() {
                var notificacao = document.createElement("a");
                notificacao.href = this.link;
                $(notificacao).text(this.texto);

                notificacoes.push(notificacao);
            });

            notificacoes_container.each(function() {
                var notificacao_container = this;
                $(notificacao_container).empty();

                $(notificacoes).each(function() {
                    var notificacao_li = document.createElement("li");

                    $(notificacao_container).append($(notificacao_li).append(this));
                });
            });
         }
        )
        .fail(
         function() {
           console.log("Erro ao atualizar as notificacões.");
         }
      );
    }

    var id_usuario = $("#id_usuario");

    if (id_usuario.length) {
      id_usuario = id_usuario[0].dataset.id;

      atualizaNotificacoes(id_usuario);
      atualizaNumeroGrupoCadastrados(id_usuario);
      atualizaNumeroGrupoParticipando(id_usuario);

      setInterval(
        () => {
          atualizaNotificacoes(id_usuario);
          atualizaNumeroGrupoCadastrados(id_usuario);
          atualizaNumeroGrupoParticipando(id_usuario);
        },
        3000
      );
    }

    var faltamDias = $(".faltamDias");

    faltamDias.each(function() {
        if (moment(this.dataset.inicial).isSame(moment(), "day")) {
          $(this).text("É hoje!");
        } else {
          if (moment(this.dataset.inicial).isAfter(moment())) {
            $(this).text("Faltam " + (moment().diff(moment(this.dataset.inicial), "days") + 1) + " dia(s).");
          } else {
            $(this).text("Encerrado.");
          }
        }
    });
});
