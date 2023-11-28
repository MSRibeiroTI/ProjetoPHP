$(document).ready(function(){
  $("#login").keyup(function(){
    var pesquisa = $("#login").val();

    if(pesquisa != ''){
      var dados = {
        palavra : pesquisa
      }
      $.post('login_search.php', dados, function(retorna){
        $(".resultado").html(retorna);
        });
    }

  });
});
