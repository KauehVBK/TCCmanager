<?php 

include "config.php";

    if (isset($_POST['update'])) {

        $nome = $_POST['Nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $celular = $_POST['celular'];
        $ID_usu = $_POST['ID_usu'];

    
        $sql = "UPDATE `usuario` SET `Nome`='$nome',`email`='$email',`senha`='$senha',`celular`='$celular' WHERE `ID_usu`='$ID_usu'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

           // echo "O sistema foi atulizado.";

        }else{

           // echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['ID_usu'])) {

    $ID_usu = $_GET['ID_usu']; 

    $sql = "SELECT * FROM usuario WHERE ID_usu='$ID_usu'";

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<Div class="container-fluid" class="position-static">
         <h2>tabela para Atualizar</h2>

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

            <input type="submit" value="atualizar" name="update" class="btn btn-info">

          
          </fieldset>

        </form> 

        
</Div>
        </body>

        </html> 

    <?php

    } else{ 

        header('Location: view.php');

    } 

}
if (isset($_POST['update'])) {
if ($result == TRUE) {

    echo "<h4>O sistema foi atualizado.</h4>";
    echo"  
    <div class=container-fluid class=position-static>

    <input type=button class=button_active onclick=location.href='view.php' value=Voltar>
    </div>
    ";

}else{

    echo "Error:" . $sql . "<br>" . $conn->error;

}
}



?> 