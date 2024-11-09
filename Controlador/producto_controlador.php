<?php
    include("../Modelo/Producto.php");
    
    //Mostrar la informacion(controlador)
    function tabla_general($filtro){
        $result = consulta_serv_general($filtro);
        $tabla_resultados = '<table class="table table-hover">'.
                '    <thead>'.
                '        <tr>'.
                '        <th scope="col">C&oacute;digo</th>'.
                '        <th scope="col">Nombre</th>'.
                '        <th scope="col">Descripción</th>'.
                '        <th scope="col">Precio</th>'.
                '        <th scope="col">Fecha de Registro</th>'.
                '        <th scope="col">Cantidad</th>'.
                '        <th scope="col">Acciones</th>'.
                '        </tr>'.
                '    </thead>';
        $tabla_resultados = $tabla_resultados . ' <tbody>';
        while($rw = $result->fetch_assoc()){
            $tabla_resultados = $tabla_resultados . ' <tr>';
            $tabla_resultados = $tabla_resultados . '  <th scope="row">' . $rw['id'] . '</th>';
            $tabla_resultados = $tabla_resultados . '  <td>' . $rw['nombre'] . '</td>';
            $tabla_resultados = $tabla_resultados . '  <td>' . $rw['descripcion'] . '</td>';
            $tabla_resultados = $tabla_resultados . '  <td>' . $rw['precio'] . '</td>';
            $tabla_resultados = $tabla_resultados . '  <td>' . $rw['fecha_registro'] . '</td>';
            $tabla_resultados = $tabla_resultados . '  <td>' . $rw['cantidad'] . '</td>';
            $tabla_resultados = $tabla_resultados . '  <td> </td>';
            $tabla_resultados = $tabla_resultados . '  </tr>';
        }
        $tabla_resultados = $tabla_resultados . '</tbody>';
        $tabla_resultados = $tabla_resultados . ' </table>';
        return($tabla_resultados);
    }


    //Registrar informacion(modelo)
    function agregar_servicio_ctrl(){
        $nombre = "";
        $descripcion = "";
        $precio = "";
        $cantidad = "";
        if (isset($_REQUEST['nombre'])){
            $nombre = $_REQUEST['nombre'];
        }
        if (isset($_REQUEST['descripcion'])){
            $descripcion = $_REQUEST['descripcion'];
        }
        if (isset($_REQUEST['precio'])){
            $precio = $_REQUEST['precio'];
        }
        if (isset($_REQUEST['cantidad'])){
            $descuento = $_REQUEST['cantidad'];
        }

        $result = agregar_servicio($nombre, 
                              $descripcion,
                              $precio,
                              $cantidad);
        
        return($result);
    }
    
    $operacion = "";
    if (isset($_REQUEST['operacion'])){
        $operacion = $_REQUEST['operacion'];
    }

    $resultado = "";

    switch ($operacion){
        case 'GENERAL' : {
            if (isset($_REQUEST['filtro'])){
                $filtro = $_REQUEST['filtro'];
                $resultado = tabla_general($filtro);
            }
            else{
                $resultado = tabla_general("");
            }
            break;
        }
        case 'AGREGAR' : {
            $resultado = agregar_servicio_ctrl();
            break;
        }

    }

    
    echo $resultado;

?>