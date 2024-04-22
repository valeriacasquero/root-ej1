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

$error_mail= '';
$error_pass= '';

if (isset($_POST['send'])) {

    if (!isset($_POST['email'])){      //!isset busca si no esta en el array
        //esta seteado el email
        echo 'No existe email';
    }else{
        echo 'Si existe el email';
        $email = trim($_POST['email']);//trim quita los vacios antes y despues del string
        
        if (empty($email)){
                echo 'email no puede estar vacio';
        }else{
            echo 'Email no esta vacio';
            if(strlen($email)<5 || strlen($email)>120){                //strlen es breviatura de string leng (largo del string) y te devuelve un estero (cantidad de caracteres dentro de la variable)
                echo 'Ingrese un correo entre 5 y 120 casactéres';
            }else{
                if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                    echo "el email es correcto";
                }else{
                    echo"El email es incorrecto";
                }
            }
        }
    }

    if (!isset($_POST['password'])){      //!isset busca si no esta en el array
        //esta seteado el email
        echo 'No existe la contraseña';
    }else{
        echo 'Si existe la contraseña';
        $password = trim($_POST['password']);//trim quita los vacios antes y despues del string
        if (empty($password)){
                echo 'la contraseña no puede estar vacio';
        }else {
            echo 'la contraseña no esta vacio';
            if(strlen($password)<3 || strlen($password)>10){                //strlen es breviatura de string leng (largo del string) y te devuelve un estero (cantidad de caracteres dentro de la variable)
                echo 'Ingrese un correo entre 3 y 10 casactéres';
            }else{
                echo"La cantidad de caractéres es correcta";
                if ($email === $usuarioPrueba_user) {
                    $verificar = password_verify($password, $usuarioPruebaHash);
                    if ($verificar === false) {
                        echo 'contraseña incorrecta';
                    }else{
                        echo 'todo correcto.<hr>';
                    }
                }else{
                    echo 'usuario incorrecto.<br>';
                }
            }
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
            <div class="col_12 title_login"> <h1>INICIAR SESION</h1></div>
            <div class="col_12 mail_login"> <input type="email" name="email" placeholder="ingrese su email" ></div>
            <div class="col_12 pass_login"> <input type="password" name="password
            " placeholder="ingrese su contraseña" ></div>
            <div class="col_12 button_login"> <button type="submit" name="send">Iniciar</button></div>
        </form>
    </main>
    
</body>
</html>