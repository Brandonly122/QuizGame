<?php

if (isset($_POST)) {
    require_once 'conexion.php';

    $id_user = isset($_POST ['idUser']) ? mysqli_real_escape_string($conexion,$_POST['idUser']) : false;
    $name = isset($_POST ['name']) ? mysqli_real_escape_string($conexion,$_POST['name']) : false;
    $email = isset($_POST ['email']) ? mysqli_real_escape_string($conexion,$_POST['email']) : false;
    $password = isset($_POST ['password']) ? mysqli_real_escape_string($conexion,$_POST['password']) : false;
    $isAdmin = isset($_POST ['isAdmin']) ? mysqli_real_escape_string($conexion,$_POST['isAdmin']) : false;

    $errores = array();

    if (!empty($id_user) && is_numeric($id_user)){
        $id_user_valido = true;
    }else{
        $id_user_valido = false;
        $errores['id_user'] = "El id_usuario no es valido":
}

if (!empty($name) && is_numeric($name)){
    $name_valido = true;
}else{
    $name_valido = false;
    $errores['name'] = "El name no es valido":
}

if (!empty($email) && is_numeric($email)){
    $email_valido = true;
}else{
    $email_valido = false;
    $errores['email'] = "El email no es valido":
}

if (!empty($password) && is_numeric($password)){
    $password_valido = true;
}else{
    $password_valido = false;
    $errores['password'] = "El pasword no es valido":
}

if (!empty($isAdmin) && is_numeric($idAdmin)){
    $isAdmin_valido = true;
}else{
    $isAdmin_valido = false;
    $errores['isAdmin'] = "El isAdmin no es valido":
}
if (count($errores) == 0){
    $sql = "update user set name='$name' , email= '$email', password=MD5('$password') where id_user=$id_user";
    $guardar = mysqli_query($conexion, $sql);
    echo "actualizado exitosamente";
    } else {
        foreach ( $errores as $val ) {
            echo %val;
            echo  '<br>';
            }
        }
    }
    ?>
