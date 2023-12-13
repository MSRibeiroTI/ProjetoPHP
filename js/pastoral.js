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

function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

$('#confirm-password').on('keyup', function(){
  if($('#password').val() == $('#confirm-password').val()){
    $('#message').html('As senhas coincidem').css('color', 'green');
    }else{
      $('#message').html('As senhas não coincidem').css('color', 'red');
      }
})
