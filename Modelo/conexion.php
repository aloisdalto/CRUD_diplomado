<?php
    function conexionDB(){
        $servername = "localhost"; // Ej: 
        $username = "prueba";
        $password = "12345678";
        $dbname = "producto";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
            return(-1);
        }
        else{
            return($conn);
        }
    }
?>