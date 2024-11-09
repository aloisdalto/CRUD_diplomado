<?php 
    include("conexion.php");

    //Mostrar la informacion(modelo)
    function consulta_serv_general($filtro){
        $conn = conexionDB();
        $sql = "SELECT id, nombre, descripcion, precio, fecha_registro, cantidad FROM `producto` ".
               " WHERE  nombre like '%" . $filtro . "%';";
        $resultados = $conn->query($sql);
        $conn->close();

        return($resultados);
    }


    //Registrar informacion(modelo)
    function agregar_servicio($nombre, 
                              $descripcion,
                              $precio,
                              $cantidad){
        $conn = conexionDB();
        $resp = "";
        $sql = "INSERT INTO producto (nombre, descripcion, precio, cantidad) VALUES ('$nombre', '$descripcion', '$precio' , '$cantidad');";        

        try {
            $conn->query($sql);
            $resp = "Se agregó con éxito";
        } catch (mysqli_sql_exception $e) {
            $resp = "Error en la base de datos: " . $e->getMessage();
        } catch (Exception $e) {
            $resp = "Error inesperado: " . $e->getMessage();
        }

        $conn->close();

        return($resp);
    }


    //Modificar Productos
    
?>