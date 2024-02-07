<?php
if(isset($_POST)){
    require_once 'conexion.php';
    $pregunta = isset($_POST['pregunta'])? mysqli_real_escape_string($con, $_POST['pregunta'])
    : false;

    $error=array();

    if(empty($pregunta)){
        $error['pregunta'] = "La pregunta no puede estar vacia";
    }
    if(empty($imagen)){
        $error['imagen'] = "La imagen no puede estar vacia";
    }
    if (count($error)==0){
        $sql = "Insert INTO preguntas VALUES(null, '$pregunta', '$imagen')";
        $query = mysqli_query($con, $sql)
    }
    else{
        $respuesta = array(
            'status' => 'error',
            'code' => 400,
            'message' => 'error en los datos',
            'error' => $error
        );
    }
}
?>