Comentario

1  Buscar un objeto desde la API que se consume.

    Acá se realizo una funcion la cual utilizando la libreria curl realiza un request mediante Http get para consultar la API de
    libros y obtener resultados. Esta devuelve un Json para su lectura y despliegue en el archivo index.php mediante foreach.

2 Visualizar el objeto y algunos de sus datos en el componente web.

    Se complementa con el punto uno, al listar los 10 resultados que devuelde la API. Se puede ver en el archivo index.php


3   Guardar el objeto en una base de datos. (Puede ser una base web, como Always
Data o similar). El objeto guardado debe verse en una sección del componente web
llamada “Objetos guardados” o de nombre parecido.


    Se guarda el libro con algunos datos en base de datos MYSQL, tabla tbl_libros mediante la conexion PDO. Esto se puede observar en el archivo 'include/function.php'

4 Modificar el objeto, por ejemplo, agregarle un comentario, etiqueta o un “me gusta”.
(Sugerencias).

    Se creo el campo comentario y se realiza un pequeño modulo para que se registre algun comentario en la base de datos a traves de una function que actualiza el registro especificamente campo "comentario".

5 Borrar el objeto de la base propia donde se guardó y que además desaparezca de la
sección de “Objetos guardados” visible en el componente web.

    Se creo la funcion eliminar asociada al boton que se despliega luego de guardar un registro. Esta funcion se puede ver en function.php