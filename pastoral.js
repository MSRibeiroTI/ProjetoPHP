function validar_registro(){
  var nome = document.getElementById('nome-agente').value;
  var login = document.getElementById('login').value;
  var nivel_acesso = document.getElementById('nivel_acesso').value;
  var password1 = document.getElementById('senha').value;
  var password2 = document.getElementById('confirmar-senha').value;
  if(nome == "" || login == "" || nivel_acesso == "" || password1 == "" || password2 == ""){
    alert("Todos os campos são obrigatórios");
    return false;
    }else {
      if (password1 != password2) {
        alert ("As senhas não correspondem!")
        return false;
        } else {
          alert("Registrado correctamente");
          $.ajax({
            url: 'cadBat.php',
            type: "POST",
            dataType:"json",
            data:{
              nome:nome,
              login:login,
              nivel_acesso:nivel_acesso,
              password:password1
              },success:function(data){
                console.log(data);
                if (data=='exito') {
                  window.location="login";
                  }
                  }});
                  }
                  }
                  }

                  

