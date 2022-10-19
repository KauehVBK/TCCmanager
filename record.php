<?php
include "config.php";

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

      echo "CADASTRO FEITO <br> <a href= login.php>Click aqui para continuar</a>";
    } else {
       echo "erro" . $sql . "<br>" . $conn->erro;
    }

    $conn->close();
}

?>