<?php 

include "config.php"; 

if (isset($_GET['ID_usu'])) {

    $ID_usu= $_GET['ID_usu'];

    $sql = "DELETE FROM `usuario` WHERE `ID_usu`='$ID_usu'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Deletado com sucesso.";
        echo "<br> <a href= view.php>click aqui para voltar</a>";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">