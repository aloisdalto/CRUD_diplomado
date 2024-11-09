<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
    <title>Productos - General</title>
</head>
  <body id="body">
  <header>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">CRUD</a> 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="producto_general.php">Productos</a>
        </li>
        
      </ul>
      <form class="d-flex" id="filtro">
        <input class="form-control me-2" type="text" aria-label="Search" name="nombre" id="nombre">
        <button class="btn btn-outline-success" type="submit" id="enviar">Search</button>
        <a href="producto_formulario.php" class="btn btn-outline-primary" type="submit">Agregar</a>
      </form>
    </div>
  </div>
  </nav>
  </header>
  <br><br>
  <main>
    <div id="tabla_resultados">
    </div>
  </main>

      <script src="../Bootstrap/js/bootstrap.bundle.min.js"></script>    
      <script src="../scriptJS/jquery_3_6_0.js"></script>

      <script> 
          // $(document).ready(function() {
          // $("#body").load(function() {
            document.addEventListener('DOMContentLoaded', function() {
              event.preventDefault();
              var filtro = $("#nombre").val();
              var operacion = "GENERAL";
            
              $("#resultado").html("Procesando..."); // Mostrar un mensaje de carga
            
              $.ajax({
                  url: "../Controlador/producto_controlador.php",
                  method: "POST",
                  data: { filtro: filtro,
                          operacion:operacion
                   },
                  success: function(response) {
                      // alert(response);
                      $("#tabla_resultados").html(response);
                  },
                  error: function() {
                      $("#tabla_resultados").html("Error al procesar la solicitud");
                  }
              });
          });
      // });
        
          $(document).ready(function() {
          $("#enviar").click(function() {
              event.preventDefault();
              var filtro = $("#nombre").val();
              var operacion = "GENERAL";
          
              $("#resultado").html("Procesando..."); // Mostrar un mensaje de carga
          
              $.ajax({
                  url: "../Controlador/producto_controlador.php",
                  method: "POST",
                  data: { filtro: filtro,
                          operacion:operacion
                   },
                  success: function(response) {
                      // alert(response);
                      $("#tabla_resultados").html(response);
                  },
                  error: function() {
                      $("#tabla_resultados").html("Error al procesar la solicitud");
                  }
              });
          });
      });

      </script>
  </body>
</html>