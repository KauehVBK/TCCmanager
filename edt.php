<?php 

include "config.php";

    if (isset($_POST['Update'])) {

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $matricula = $_POST['matricula'];
        $datanasc = $_POST['datanasc'];
        $celular = $_POST['celular'];

        $sql = "UPDATE `usuario` SET `Nome`='$nome',`email`='$email',`senha`='$senha',`celular`='$celular' WHERE `ID_usu`='$ID_usu'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "O sistema foi atulizado.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['ID_usu'])) {

    $ID_usu = $_GET['ID_usu']; 

    $sql = "SELECT * FROM `usuario` WHERE `ID_usu`='$ID_usu'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $nome = $row['Nome'];

            $email = $row['email'];

            $senha  = $row['senha'];

            $celular = $row['celular'];

            $ID_usu = $row['ID_usu'];

        } 

    ?>

        <h2>tabela de Atualizar</h2>

        <form action="" method="post">

          <fieldset>

            <legend>informações pessoais:</legend>

            Nome:<br>

            <input type="text" name="Nome" value="<?php echo $nome; ?>">

            <input type="hidden" name="ID_usu" value="<?php echo $ID_usu; ?>">

            <br>

            Email:<br>

            <input type="email" name="email" value="<?php echo $email; ?>">


            <br>

            Celular:<br>

            <input type="text" name="celular" value="<?php echo $celular; ?>">
           
            <br>

            senha:<br>

            <input type="text" name="senha" value="<?php echo $senha; ?>">

            
            <br><br>

            <input type="submit" value="Update" name="Atualizar">

          </fieldset>

        </form> 

        </body>

        </html> 

    <?php

    } else{ 

        header('Location: view.php');

    } 

}

?> 