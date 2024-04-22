<?php


var_dump($_POST);

$usuarioPrueba_user = 'usuario@prueba.ts';
$usuarioPrueba_pass = 'password';
$usuarioPrueba_passHash = password_hash($usuarioPrueba_pass, PASSWORD_DEFAULT);

echo 'usuario prueba; '.$usuarioPrueba_user.'<br>';
echo 'contraseña prueba: '.$usuarioPrueba_pass.'<br>';
echo 'contraseña hasheada: '.$usuarioPrueba_passHash.'<br>';

$email = '';
$password = '';

$error_email= '';
$error_pass= '';

if (isset($_POST['send'])) {

    $errorFlag = false;

    #campo e-mail

        /*01-existe?*/
        if (!isset($_POST['email'])){
            $error_email = 'No existe email';
            $errorFlag = true;
        }else{
            $email = trim($_POST['email']);
        }
        /*02-existe?*/
        if (empty($error_email)) {
            if (empty($email)){
                $error_email = 'email no puede estar vacio';
                $errorFlag = true;
            }
        }
        
        /*03-cantidad de caracteres permitidos*/

        if (empty($error_mail)) {
            if(strlen($email)<5 || strlen($email)>120){                //strlen es breviatura de string leng (largo del string) y te devuelve un estero (cantidad de caracteres dentro de la variable)
                $error_email = 'Ingrese un correo entre 5 y 120 casactéres';
                $errorFlag = true;
            }
        }

        /*04-Formato de Email*/

        if (empty($error_mail)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error_email = "el email es correcto";
                $errorFlag = true;
            }else{
                $error_email = "El email es incorrecto";
                $errorFlag = true;
            }
        }

    #Fin campo e-mail

    #campo password    

    $errorFlag = false;

        if (!isset($_POST['password'])) {
            $error_pass = 'No existe la contraseña';
            $errorFlag = true;
        }

        if (empty($error_pass)) {
            if (empty($password)){
                $error_pass = 'la contraseña no puede estar vacio';
                $errorFlag = true;
            }
        }

        if (empty($error_pass)) {
            if(strlen($password)<3 || strlen($password)>10){
                //strlen es breviatura de string leng (largo del string) y te devuelve un estero (cantidad de caracteres dentro de la variable)
                $error_pass = 'Ingrese un correo entre 3 y 10 casactéres';
                $errorFlag = true;
            }
        }

        if ($error_pass) {
            $error_pass = "La cantidad de caractéres es correcta";
            $errorFlag = true;
            if ($email === $usuarioPrueba_user) {
                $verificar = password_verify($password, $usuarioPruebaHash);
                if ($verificar === false) {
                    $error_pass = 'contraseña incorrecta';
                    $errorFlag = true;
                }else{
                    $error_pass = 'todo correcto.<hr>';
                    $errorFlag = true;
                }
            }else{
                $error_pass = 'usuario incorrecto.<br>';
                $errorFlag = true;
            } 
        }
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>LOGIN</title>
</head>
<body>
    <main class="row flex flex-justify-center login_cont">
        <form class="col_4 login_form" method="post">
            <div class="col_12 title_login">
                <h1>INICIAR SESION</h1>
            </div>
            <div class="col_12 mail_login">
                <input type="email" name="email" placeholder="ingrese su email" value="<?=$password?>" >
                <div class="col_12 msg_error"><?=$error_email?>
                </div>
            </div>
            <div class="col_12 pass_login"> 
                <input type="password" name="password" placeholder="ingrese su contraseña" >
                <div class="col_12 msg_error"><?=$error_pass?></div>
            </div>
            <div class="col_12 button_login">
                <button type="submit" name="send">Iniciar</button>
            </div>
        </form>
    </main>
    
</body>
</html>