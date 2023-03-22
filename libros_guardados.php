<?php
include './include/function.php';

$eliminado = 0;

if(isset($_POST['txtIdLibro'])){

   $eliminado =  eliminarLibro($_POST['txtIdLibro']);
}


// var_dump($_POST);
$libros = obtenerLibrosGuardados();
// var_dump($libros);



?>
<!DOCTYPE html>
<html lang="en">
<?php include './include/meta.php'; ?>
<body>
    <header class='mb-4'>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark  bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Libros</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Libros Guardados</a>
          </li>
        </ul>
        <!-- <form class="d-flex" method="post">
          <input class="form-control me-2" type="txt" placeholder="Buscar Libro" name="txtLibro" aria-label="Search">
          <button class="btn btn-outline-success" name="btnBuscar" type="submit">Buscar</button>
        </form> -->
      </div>
    </div>
  </nav>
</header>

<!-- Begin page content -->
<!-- <main class="flex-shrink-0"> -->
  <div class="container">
  <?php if($eliminado){ ?>    
  
  <div class="alert alert-success" role="alert">
  Libro Eliminado Exitosamente! 
  </div>

<?php } ?>
      <div class="row mt-3 mb-3">
    <div class="col-12 text-center">
      <h2>Libros Guardados</h2>
    </div>
  </div>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Titulo</th>
      <th scope="col">Autor</th>
      <th scope="col">Imagen</th>
      <th scope="col">Comentario</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if(count($libros) > 0){
            foreach($libros as $fila){ ?>
            <tr>
                
                <td><?php echo $fila['title'];?></td>
                <td><?php echo $fila['authors'];?></td>
                <td><?php echo '<img src="'.$fila['imagen'].'"/>'; ?></td>
                <td><?php echo $fila['comentario']; ?></td>
                <td class="align-middle">
                  <form method="POST" id="eliminar<?php echo $fila['id'];?>" name="eliminar<?php echo $fila['id'];?>" action="#" >
                      <!-- Button trigger modal -->
                        <input type="text" name="txtIdLibro" hidden value="<?php echo $fila['id'];?>" class="form-control" />
                        <button type="button" name="btnEliminar" onClick="eliminar(<?php echo $fila['id'];?>,'<?php echo $fila['title'];?>');" class="btn btn-danger">
                          Eliminar
                        </button>
                  </form>
                  <form method="POST" id="editar" name="editar" action="editar_libro.php" >
                      <!-- Button trigger modal -->
                        <input type="text" name="txtIdLibro" hidden value="<?php echo $fila['id'];?>" class="form-control" />
                        <input type="text" name="txtTitle" hidden value="<?php echo $fila['title'];?>" class="form-control" />
                        <button type="submit" name="btnEditar" class="mt-1 btn btn-primary">
                          Agregar comentario
                        </button>
                  </form>                  
              </td>
            </tr>
    <?php
            }
          }else{ ?>
            <tr>
            <!-- <th scope="row"></th> -->
            <td colspan="4" class="text-center "><strong>No hay registros guardados</strong></td>
        </tr>
          <?php }
    ?>
    
  </tbody>
</table>
  </div>
<!-- </main> -->


    
</body>
</html>
<script language="javascript" src="./include/function.js"></script>