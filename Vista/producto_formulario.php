<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
    <title>Registrar Productos</title>
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
          <a class="nav-link" href="prodcuto_general.php">Productos</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
</header>
<br><br>
<main>
 <div class="container px-4">
  <form class="row gy-3">
    <div class="col-12">
      <label for="nombre" class="form-label">Nombre del producto</label>
      <input type="text" class="form-control" id="nombre" name="nombre">
    </div>
    <div class="input-group">
    <span class="input-group-text"><label for="descripcion">Descripcion del producto</label></span>
      <textarea class="form-control" id="descripcion" name="descripcion" aria-label="Descripcion del servicio" placeholder="Detalles del producto..."></textarea>
    </div>
    <div class="col-md-2">
      <label for="precio" class="form-label">Precio del producto ($)</label>
      <input type="number" class="form-control" id="precio" name="precio" value="1" min="1">
    </div>
    <div class="col-md-2">
      <label for="cantidad" class="form-label">Cantidad del producto</label>
      <input type="number" class="form-control" id="cantidad" name="cantidad" value="0" min="0" max="99">
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary" id="guardar">Agregar</button>
      <a href="producto_general.php" class="btn btn-secondary">Consultar</a>
    </div>
  </form>
 </div>
</main>

<script src="../Bootstrap/js/bootstrap.bundle.min.js"></script>    
<script src="../scriptJS/jquery_3_6_0.js"></script>

<script> 
    $(document).ready(function() {
    $("#guardar").click(function() {
        event.preventDefault();
        var operacion = "AGREGAR";
        var nombre = $("#nombre").val();
        var descripcion = $("#descripcion").val();
        var precio = $("#precio").val();
        var cantidad = $("#cantidad").val();

        $("#resultado").html("Procesando..."); 

        $.ajax({
            url: "../Controlador/producto_controlador.php",
            method: "POST",
            data: {
              operacion: operacion,
              nombre: nombre,
              descripcion: descripcion,
              precio: precio,
              cantidad: cantidad
             },
            success: function(response) {
                alert(response);
            },
            error: function() {
              alert("Error al procesar la solicitud");
            }
        });
    });
});
</script>
</body>
</html>