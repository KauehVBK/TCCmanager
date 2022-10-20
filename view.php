<?php 

include "config.php";

$sql = "SELECT * FROM usuario";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>Tela view</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<nav class="navbar">
  <!-- <a class="nav-link" href="posts">Posts <span class="sr-only">(current)</span></a> -->
    
    <span class="navbar-toggler-icon"></span>
</nav>

<body>

    <div class="container">

        <h2>Usuarios</h2>

<table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>Nome</th>

        <th>Email</th>

        <th>Matricula</th>

        <th>Data de nascimento</th>

        <th>Celular</th>


        <th>Ações</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['ID_usu']; ?></td>

                    <td><?php echo $row['Nome']; ?></td>

                    <td><?php echo $row['email']; ?></td>
                    
                    <td><?php echo $row['matricula']; ?></td>
                    
                    <td><?php echo $row['datanasc']; ?></td>

                    <td><?php echo $row['celular']; ?></td>

                    <td>
                    <a class="btn btn-info" href="edt.php ?ID_usu=<?php echo $row['ID_usu']; ?>" >
                    Editar</a>&nbsp;<a class="btn btn-danger" href="delete.php?ID_usu=<?php echo $row['ID_usu']; ?>" >
                    Deletar</a></td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>