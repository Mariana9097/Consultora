<?php
include "conexionBD.php";


$email = trim($_POST['email']);
$contrasenia = $_POST['contrasenia'];
if(!empty($email) && !empty($contrasenia)){


/*----Borrar----------$consulta2 = $con->query("SELECT * FROM empresa WHERE email = '$email'");

    if (($consulta2->num_rows)==1) {
        $resultado2 = $consulta2->fetch_assoc();
        $cifrada = $resultado2["password"];
        if (password_verify($contrasenia, $cifrada)){
            $_SESSION['empresa'] = $resultado2;
            header("Location: indexEmpresa.php");
            if(isset($_SESSION['error_login'])){
                session_unset($_SESSION['error_login']);
            }
        }else{
            $_SESSION['error_login'] = "Login incorrecto!!";
            header("Location: login.php");
        }
         
        header("Location: login.php");
        }
    else{
  header("Location: indexEmpresa.php");
    }
}
----------------------------------*/
$consulta1 = $con->query("SELECT * FROM colaborador WHERE email= '$email'");

if (($consulta1->num_rows) == 1) { //Si la consulta 1 obtiene un resultado verifica la contraseña
    
    $resultado1 = $consulta1->fetch_assoc();
    $cifrada = $resultado1["password"];
    
    if (password_verify($contrasenia, $cifrada)) {
        //Si la contraseña cifrada coincide con lo ingresado se inicia la sesión
        session_start();
        //En la variable de sesión se guardan los datos del usuario que ingresó
        $_SESSION["colaborador"] = $resultado1;
        //Se redirigue a la página principal correspondiente al usuario
        header("Location: indexColaborador.php");

    } else {
        header("Location: login.php?error=0");
    }
} else {

    $consulta2 = $con->query("SELECT * FROM empresa WHERE email = '$email'");

    if (($consulta2->num_rows) == 1) {
        
        
        $resultado2 = $consulta2->fetch_assoc();
        $cifrada = $resultado2["password"];

        if (password_verify($contrasenia, $cifrada)) {
            
            session_start();
            $_SESSION["empresa"] = $resultado2;
            header("Location: indexEmpresa.php");

        } else {
            header("Location: login.php?error=0");
        }
    } else {

        $consulta3 = $con->query("SELECT * FROM administrador WHERE email = '$email'");

        if (($consulta3->num_rows) == 1) {
            
            $resultado3 = $consulta3->fetch_assoc();
            $cifrada = $resultado3["contraseniaAdm"];
            
            if (password_verify($contrasenia, $cifrada)) {
                
                session_start();
                $_SESSION["administrador"] = $resultado3;
                header("Location: indexAdm.php");

            } else {
                header("Location: login.php?error=0");
            }
        } else { //Si ninguna consulta obtnien resultado el email ingresado no existe en la base de datos
            header("Location: login.php?error=1");
        }
    }
}
}
?>