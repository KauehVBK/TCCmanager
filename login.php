<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: view.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$nome = $senha = "";
$nome_err = $senha_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["nome"]))){
        $nome_err = "nome.";
    } else{
        $nome = trim($_POST["nome"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["senha"]))){
        $senha_err = "senha esta incorreta.";
    } else{
        $senha = trim($_POST["senha"]);
    }
    
    // Validate credentials
    if(empty($nome_err) && empty($senha_err)){
        // Prepare a select statement
        $sql = "SELECT ID_usu, Nome, senha FROM usuarios WHERE nome = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $nome;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $ID_usu, $nome, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($senha, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["ID_usu"] = $ID_usu;
                            $_SESSION["nome"] = $nome;                            
                            
                            // Redirect user to welcome page
                            header("location: view.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "nome de usuario invalido.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "nome de usuario invalido.";
                }
            } else{
                echo "Algo deu errado tente depois.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>nome</label>
                <input type="text" name="nome" class="form-control <?php echo (!empty($nome_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nome; ?>">
                <span class="invalid-feedback"><?php echo $nome_err; ?></span>
            </div>    
            <div class="form-group">
                <label>senha</label>
                <input type="password" name="senha" class="form-control <?php echo (!empty($senha_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $senha_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Não tem uma conta ainda? <a href="create.php">crie aqui</a>.</p>
        </form>
    </div>
</body>
</html>