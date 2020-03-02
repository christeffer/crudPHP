<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1; margin: auto; width: 440px;}

input[type=text], input[type=password] {
  width: 40%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
}

button:hover {
  opacity: 0.8;
}

.container {
  padding: 16px;
  width: 800px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
<?php
if ( isset($erro) && $erro !== "" ) {
	echo "<script>alert('$erro');</script>";
}
?>
<form action="<?php echo HOME_URL . 'login/logar' ?>" method="post">  
  <div class="container">
	<label for="uname"><b>Usuário</b></label>
	<br />
    <input type="text" placeholder="Digite o Usuário" name="login" required>
	<br />
	<label for="psw"><b>Senha</b></label>
	<br />
    <input type="password" placeholder="Digite a senha" name="senha" required>
    <br />    
    <button type="submit">Entrar</button>    
  </div>
  
</form>

