<?php


function obtenerLibro ($nombre ='futbol'){

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/books/v1/volumes?q='.$nombre); 
    // curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/books/v1/volumes/1N0KDgAAQBAJ');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    $data = curl_exec($ch);
    // var_dump($data);
    curl_close($ch); 
    return json_decode($data);
}



function obtenerLibroPorID ($id){

    $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/books/v1/volumes?q='+$nombre); 
    curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/books/v1/volumes/'.$id);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    $data = curl_exec($ch);
    // var_dump($data);
    curl_close($ch); 
    
}


function obtenerLibrosGuardados (){

    try {

        $conn = include 'SQL/conexion.php';

        $query = "SELECT * FROM tbl_libros";
        $rs = $conn->prepare($query);
        $rs->execute();
        return $rs->fetchall();

    } catch (PDOException $error) {
        //throw $th;
        echo $error;
    }

    
}


function GuardarLibro ($title,$id_api,$authors,$image){
    
    try {

        $conn = include 'SQL/conexion.php';

        $query = "INSERT INTO tbl_libros (title,id_api,authors,imagen,created_at) values (:title,:id_api,:authors,:imagen,NOW())";
        $rs = $conn->prepare($query);
        $rs->bindParam(':title',$title);
        $rs->bindParam(':id_api',$id_api);
        $rs->bindParam(':authors',$authors);
        $rs->bindParam(':imagen',$image);
        return $rs->execute();

    } catch (PDOException $error) {
        //throw $th;
        echo $error;
    }
    

    
    
}


function eliminarLibro ($id){
    
    try {

        $conn = include 'SQL/conexion.php';

        $query = "DELETE FROM tbl_libros where id = :id";
        $rs = $conn->prepare($query);
        $rs->bindParam(':id',$id);
        return $rs->execute();

    } catch (PDOException $error) {
        //throw $th;
        echo $error;
    }
    

    
    
}


function AgregarComentario($id,$texto){

    try {

        $conn = include 'SQL/conexion.php';

        $query = "UPDATE tbl_libros set comentario =:texto where id = :id";
        $rs = $conn->prepare($query);
        $rs->bindParam(':texto',$texto);
        $rs->bindParam(':id',$id);
        return $rs->execute();

    } catch (PDOException $error) {
        //throw $th;
        echo $error;
    }

}