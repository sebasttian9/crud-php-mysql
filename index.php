<?php
include './include/function.php';

// var_dump($_POST);
if(isset($_POST['btnBuscar'])){
  $busqueda = str_replace(' ','+',$_POST['txtLibro']);
  $libros = obtenerLibro($busqueda);
}else{
  $libros = obtenerLibro();
}

$creado = 0;
if(isset($_POST['btnGuardar'])){

    $creado = GuardarLibro ($_POST['txtTitle'],$_POST['txtIdLibro'],$_POST['txtAutor'],$_POST['txtImg']);
}
    

// var_dump($libros);
// echo $libros->totalItems;

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
            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./libros_guardados.php">Libros Guardados</a>
          </li>
        </ul>
        <form class="d-flex" method="post">
          <input class="form-control me-2" type="txt" placeholder="Buscar Libro" name="txtLibro" aria-label="Search">
          <button class="btn btn-outline-success" name="btnBuscar" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>
</header>

<!-- Begin page content -->
<!-- <main class="flex-shrink-0"> -->
  <div class="container">
  <?php if($creado){ ?>    
  
      <div class="alert alert-success" role="alert">
      Libro Guardado Exitosamente! <a href="./libros_guardados.php">Ver</a>
      </div>

  <?php } ?>
      <div class="row mt-3 mb-3">
    <div class="col-12 text-center">
      <h2>Listado de Libros</h2>
    </div>
  </div>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Titulo</th>
      <th scope="col">Autor</th>
      <th scope="col">Imagen</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if(isset($libros) && $libros->totalItems > 0){
            foreach($libros->items as $fila){ ?>
            <tr>
                
                <td><?php echo $fila->volumeInfo->title;?></td>
                <td><?php echo isset($fila->volumeInfo->authors[0]) ? $fila->volumeInfo->authors[0] : 'No Disponible' ;?></td>
                <td><?php echo isset($fila->volumeInfo->imageLinks->smallThumbnail) ? '<img src="'.$fila->volumeInfo->imageLinks->smallThumbnail.'"/>' : 'No disponible';?></td>
                <td class="align-middle">
                  <form method="POST" action="#" >
                      <!-- Button trigger modal -->
                        <input type="text" name="txtIdLibro" hidden value="<?php echo $fila->id;?>" class="form-control" />
                        <input type="text" name="txtTitle" hidden value="<?php echo $fila->volumeInfo->title;?>" class="form-control" />
                        <input type="text" name="txtAutor" hidden value="<?php echo isset($fila->volumeInfo->authors[0]) ? $fila->volumeInfo->authors[0] : 'No Disponible' ;?>" class="form-control" />
                        <input type="text" name="txtImg" hidden value="<?php echo isset($fila->volumeInfo->imageLinks->smallThumbnail) ? $fila->volumeInfo->imageLinks->smallThumbnail : 'No disponible';?>" class="form-control" />
                        <button type="submit" name="btnGuardar" class="btn btn-success">
                          Guardar
                        </button>
                  </form>
              </td>
            </tr>
    <?php
            }
          }else{ ?>
            <tr>
                <td colspan="4" class="text-center "><strong>No se encontraron resultados</strong></td>
        </tr>
          <?php }
    ?>
    
  </tbody>
</table>
  </div>
<!-- </main> -->


    
</body>
</html>