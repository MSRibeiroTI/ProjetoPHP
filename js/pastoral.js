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