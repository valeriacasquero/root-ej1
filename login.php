<?php

echo "<pre>";( "pre" muestra datos preformateados)
var_dump($_POST);
echo ""

if (isset($_POST['send'])) {

    if (!isset($_POST['email'])){      //!isset busca si no esta en el array
        //esta seteado el email
        echo 'No existe email';
    }else {
        echo 'Si existe el email';
        $email = $_POST['email'];
    
        if (empty(trim$email)){                 //trim quita los vacios antes y despues del string
            echo 'email no puede estar vacio'
        }
        else{
            echo 'email no esta vacio'
        }
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "el email es correcto");
            } else {
            echo"El email es incorrecto");
            }
    }
    
    if (!isset($_POST['password'])){
        echo 'la contraseña no existe';
    }else {
        echo 'existe la contraseña';
        $password = $_POST['password'];
    
        if (empty(trim$password)){
            echo 'la contraseña no puede estar vacia';
        }else {
            echo 'la contraseña no esta vacia';
        }
    
}





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
            <div class="col_12 mail_login"> <input type="email" placeholder="ingrese su email" required></div>
            <div class="col_12 pass_login"> <input type="password" placeholder="ingrese su contraseña" required></div>
            <div class="col_12 button_login"> <button>Iniciar</button></div>
        </form>
    </main>
    
</body>
</html>