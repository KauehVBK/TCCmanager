<?php 

include "config.php"; 

if (isset($_GET['ID_usu'])) {

    $ID_usu= $_GET['ID_usu'];

    $sql = "DELETE FROM `usuario` WHERE `ID_usu`='$ID_usu'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Deletado com sucesso.";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>