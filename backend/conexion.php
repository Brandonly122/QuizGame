<?php
$con=mysqli_connect("localhost","root","","quizz");
if(mysql_connect_errno()){
    echo "error al conectar a la base de datos".mysql_connect_error();
}

else{
    echo "conexion exitosa";
}

mysqli_query($con,"SET NAMES 'utf8'");
?>