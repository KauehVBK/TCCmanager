
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>

<body>

    <form action="record.php" method="POST">
        <fieldset>
            <legend>Digite suas informações</legend>

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

            <input type="submit" name="submit" value="submit" link="record.php">
        
        </fieldset>

    </form>

</body>

</html>