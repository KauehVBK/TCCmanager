<?php
include "config.php";
session_start();
if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $matricula = $_POST['matricula'];
    $datanasc = $_POST['datanasc'];
    $celular = $_POST['celular'];

    $sql = "INSERT INTO usuario(nome,email,senha,matricula,datanasc,celular) 
    VALUES ('$nome','$email','$senha','$matricula','$datanasc','$celular')";

    $result = $conn->query($sql);
    if ($result == true) {

      echo "
      <div class=container-fluid class=position-relative >
      
      CADASTRO FEITO 
      <br>
      <a href= login.php>Click aqui para continuar</a>
    
      </div>  
      ";
      
    } else {
       echo "erro" . $sql . "<br>" . $conn->erro;
    }

    $conn->close();
}

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">