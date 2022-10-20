
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>


<body >
<div class="container-fluid" class="position-static">
    <form action="record.php" method="POST" >
        <fieldset>
          <h1>Digite suas informações</h1>

            Nome <br>

            <input type="text" name="nome" required>

            <br>
 
            senha <br>

            <input type="password" name="senha"required>

            <br>

            email <br>

            <input type="email" name="email"required>

            <br>

            matricula <br>

            <input type="text" name="matricula"required>

            <br>

            celular <br>

            <input type="text" name="celular"required>

            <br>

            data de nascimento <br>

            <input type="date" name="datanasc"required>

            <br><br>

            <input type="submit" name="submit" value="enviar" link="record.php" class="btn btn-info">
        
        </fieldset>

    </form>
</div>
</body>

</html>