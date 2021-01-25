const BOSH_SERVICE = "https://gesol.mesquita.rj.gov.br:7443/http-bind";
const DOMAIN_NAME = "gesol.mesquita.rj.gov.br";
const API_URL = "https://gesol.mesquita.rj.gov.br:9091/plugins/restapi/v1";

// Variável usada pra conectar e desconectar o usuário
let _converse;

// Sweet Alert
var helper = {

    // Como usuar no html:
    // helper.showSwal1('tipo', 'titulo')
    // helper.showSwal2('tipo', 'texto1', 'texto2','texto1Sucesso', 'texto2Sucesso', 'funcaoSucesso')
    
    showSwal1: function(tipo, texto1) {
        
        if(tipo == 'basico'){
            swal({
                title: texto1,
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-roxo'
            });
        } else if (tipo == 'info') {
            swal({
                type: 'info',
                title: texto1,
                buttonsStyling: false,
                confirmButtonClass: "btn btn-info"
            });
        } else if (tipo == 'aviso') {
            swal({
                type: 'warning',
                title: texto1,
                input: 'text',
                buttonsStyling: false,
                showCancelButton: true,
                cancelButtonClass: 'btn btn-roxo',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Alterar',
                confirmButtonClass: 'btn btn-danger'
            });
        }
    }, //Fim showSwal1
}; //Fim Helper
    
$(function(){

    // Mascaras
    VMasker ($("#cpf")).maskPattern("999.999.999-99");
    VMasker ($("#matricula")).maskPattern("99/99.999-9");
    VMasker ($(".datepicker")).maskPattern("99/99/9999");
  
    // Apoiar publicação apenas logado
    $(".helper-apoio").click(function(){
        event.preventDefault();

        helper.showSwal1('info','Efetue o login para apoiar a publicação')

    });

    // Criar publicação apenas logado
    $(".helper-criaPub").click(function(){
        event.preventDefault();

        helper.showSwal1('info','Efetue o login para criar uma publicação')

    });
    
    // Botão editar, ocultar coment-fix e exibir coment-edit
    $('.btn-coment-edit').click(function() {
        
        event.preventDefault();

        $(this).parent().parent().parent().parent().find('.coment-fix').addClass('hide').parent().find('.coment-edit').removeClass('hide')

    });

    $('.minhas_solicitacoes').click(function(e) {
        e.preventDefault();
        $.get('/solicitacoes/minhas/'+id_usuario, function(resultado){
            if (resultado == "0")
                demo.notificationRight("top", "right", "rose", "Você ainda não possui Solicitações cadastradas!");   
            else
                window.location.href='/minhassolicitacoes';
        })
    });
    
    // Botão Excluir, ocultar coment-fix, exibir comentario com horário da "exclusão", demonstrar botão desfazer e oculstar botões editar e excluir
    $('.infinite-scroll').on('click', ".btn-coment-del", function () {

        var isto = this;
        var text = $(this).parent().parent().parent().parent().find('div.coment-fix p').show('p');

        event.preventDefault();

        swal({
                type: 'warning',
                title: 'Remover o comentário?',
                html: text,
                buttonsStyling: false,
                showCancelButton: true,
                cancelButtonClass: 'btn btn-roxo',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Remover',
                confirmButtonClass: 'btn btn-danger'
            }).then(function () {
                let id = $(isto).data('id');
                let token = $(isto).data('token');

                console.log("Chamou de dentro do scripts", $(isto).data('token'));

                $.post('/comentario/' + id , {

                   _token: token,
                   _method: 'DELETE' 

                }, function(data){

                    if(data == "0"){

                        // Mostrar a mensagem de erro
                        swal({
                            type: 'error',
                            title: 'Comentário nao removido!',
                            text: 'Seu comentário não pôde ser removido pois já foi respondido pela prefeitura.',
                        });

                    } else {
                        // Deletar a div do comentário
                        $('.comentario_'+id).remove();

                        // Mostrar a mensagem de sucesso
                        swal({
                            type: 'success',
                            title: 'Sucesso!',
                            text: 'Seu comentário foi removido',
                        });
                    }

                });
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                swal({
                    type: 'error',
                    title: 'Cancelado!',
                    html: 'Seu comentário não foi removido',
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-roxo'
                })
            }


            });

    });

    //Botão desfazer, exibir coment-fix, ocultar botão desfazer, demonstrar botões editar e excluir
    $('.btn-coment-des').click(function () {

        event.preventDefault();

        $(this).addClass('hide')
        $(this).parent().parent().find('a.btn-coment-edit').removeClass('hide');
        $(this).parent().parent().find('a.btn-coment-del').removeClass('hide');
        $(this).parent().parent().parent().parent().find('.coment-fix-rem').addClass('hide');
        $(this).parent().parent().parent().parent().find('.coment-fix').removeClass('hide');

    });

    // Enviar alteração, ocultar coment-edit e exibir coment-fix
    $('.btn-coment-alterar').click(function() {
        
        $(this).parent().parent().addClass('hide').parent().find('.coment-fix').removeClass('hide').find('span.label').removeClass('hide')
    });

    // Ocultar coment-edit e exibir coment-fix
    $('.coment-desfazer').click(function() {
        
        event.preventDefault();

        $(this).parent().parent().addClass('hide').parent().find('.coment-fix').removeClass('hide')

    });

    // Deslizar comentários
    $('div.infinite-scroll').on("click", ".slide-coment", function(){
        event.preventDefault();
        $(this).parent().parent().parent().parent().find('.colapso').slideToggle();
    });

    
    // Alterar cor do botão apoiar
    $('div.infinite-scroll').on("click", ".btn-apoiar", function(){
        
        event.preventDefault();

        if ($(this).hasClass('apoiar')){

            $(this).removeClass('apoiar')

        } else {

            $(this).addClass('apoiar')
        }
        
    });

    // Adicionar efeito de rotação ao ícone do objeto

    $('.rodar-icone').click(function(){
            
        var isto = this;
            
        if($(isto).find('i').hasClass('animated girar-rev')) {
            $(isto).find('i').removeClass('girar-rev').addClass('girar')
        } else if ($(isto).find('i').hasClass('animated girar')) {
            $(isto).find('i').removeClass('girar').addClass('girar-rev')
        }else {
            $(isto).find('i').addClass('animated girar')
        }
    });

    atualizarNotificacoes();

    // Expor funcionalidades privadas do Converse.js

    converse.plugins.add("teste", {

      initialize: function(){

        _converse = this._converse;

      } 

    });

    // Inicializar o Converse.js
    cadastrarNoXmpp();

    // Código para encerrar a sessão se o usuário sair da página
    window.onbeforeunload = function() {
      encerrarSessaoConverse();
    }
    

});

function cadastrarNoXmpp(){
  // Criar a conexão
  let connection = new Strophe.Connection(BOSH_SERVICE);

  // Dados do usuário atualmente logado
  const username = email.substr(0, email.indexOf('@'));
  const password = md5(username);

  connection.register.connect(DOMAIN_NAME, function(status){

    // Tentar registrar o usuário
    if(status == Strophe.Status.REGISTER){
      
      connection.register.fields.username = username;
      connection.register.fields.password = password;
      connection.register.fields.email    = email;
      connection.register.fields.name     = nome;
      connection.register.submit();
    }
    // Caso o usuário já seja registrado
    else if(   status === Strophe.Status.REGISTERED 
            || status === Strophe.Status.CONNECTED 
            || status === Strophe.Status.CONFLICT
            ){
      
      // Adicionar o usuário ao grupo que contém todos os usuários do gesol
      $.ajax(`${API_URL}/users/${username}/groups/GESOL`, {
        headers: {
          "Authorization": "Basic YWRtaW46c3R4OThAMzI=",
          "Accept": "application/json",
          "Content-Type": "application/json",
        },
        method: 'POST',
        success: function(){

          // Iniciar o Converse.js com o login automático
          converse.initialize({
            bosh_service_url: BOSH_SERVICE,
            show_controlbox_by_default: true,
            authentication: 'login',
            auto_login: true,
            jid: `${username}@${DOMAIN_NAME}`,
            password: password,
            keepalive: true,
            i18n: 'pt_BR',
            locales_url: url_base + '/js/converse/pt_BR/LC_MESSAGES/converse.json',
            nickname: nome,
            play_sounds: true,
            whitelisted_plugins: ['teste'],
          }); 
        }
      });
    }

  }, 60, 1);

}

function encerrarSessaoConverse(){
  console.log("Saindo...");
  _converse.auto_login = false;
  _converse.logOut();
}

function enviarComentario(elem, e){

   //console.log("entrou enviarComentario ID: ", $(elem).data('solicitacao') );
   // Executar essa função apenas se a tecla pressionada for o Enter ou caso nenhuma tecla tenha
   // sido pressionada (click)

   //console.log("KeyCode", e.keyCode);

   if(e.keyCode == "13" || typeof e.keyCode === 'undefined'){

      let solicitacao = $(elem).data('solicitacao');
      let funcionario = $(elem).data('funcionario');

      var comentario = $("textarea.comentario_"+solicitacao).val().trim();

      // Testar se a comentario está em branco
      if(comentario)
      {
        console.log("Vai enviar a solicitação");
         // Enviar a comentario para o banco
         $.post(
            url_base+"/comentario",
            {
               comentario:       comentario,
               solicitacao_id:   solicitacao, 
               funcionario_id:   funcionario,
               _token: token,
            }, function(resposta)
               {

                  let dados = JSON.parse(resposta);

                  console.log("Resposta", dados);

                  // Apagar o campo de envio de comentario
                  $(".comentario_"+solicitacao).val("");

                  // Colocar o novo card de comentarios embaixo da solicitação
                  var source      = $("#comentario-template").html();
                  var template    = Handlebars.compile(source)

                  var context = { 
                     data_criacao:        dados.data,
                     nome_funcionario:    dados.nome_funcionario,
                     nome_setor:          dados.nome_setor,
                     sigla:               dados.sigla, 
                     comentario:          dados.comentario, 
                  };

                  var html        = template(context);

                  $("div.comentarios").append( $(html) );

                  //posiciona a div "scrolavel" para o final
                  var objDiv = document.getElementById("div-comentarios");
                  objDiv.scrollTop = objDiv.scrollHeight;
            }      
            ).fail(function(erro){
               demo.notificationRight("top", "right", "rose", "Sessão do usuário expirada. Você será redirecionado a tela de Login em alguns segundos!"); 
               setTimeout(function(){window.location.reload()}, 10000);
         });
      }
   }
}

function comentarioAutomatico(sol, fun, com){

   console.log("entrou comentarioAutomatico ID: ");

   let solicitacao   = sol;
   let funcionario   = fun;
   let comentario    = com;

   // Enviar a comentario para o banco
   $.post(
      url_base+"/comentario",
      {
         comentario:       comentario,
         solicitacao_id:   solicitacao, 
         funcionario_id:   funcionario,
         _token:           token
      }
   );      
  
}


function atualizarNotificacoes(){

  console.log("Chamou aualizar notificações");

  // Mostrar o número correto de notificações

    $.post(url_base + "/naolidas/" + setor_id, { _token: token }, function(data){
      
      let dados = JSON.parse(data);

      // Atualizar o número de notificaçoes

      if(dados.qtd){
        $("<span class='notification'>"+dados.qtd+"</span>").insertAfter('#icone-notificacoes');
      }

      // Atualizar a lista de notificações

      for(i=0; i < dados.links.length; i++){

        $("#lista-notificacoes").append(dados.links[i]);

      }

    });

}

// Tocar o áudio da notificação

function tocarAudio(){

  let audio = document.getElementById("audio_notificacao");

  audio.play();

}