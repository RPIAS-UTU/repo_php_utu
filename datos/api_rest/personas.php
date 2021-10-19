<?php
require_once 'model/respuestas.php';
require_once '../PDO/personas_modelo.php';

$_respuestas = new respuestas;
$_personas = new Personas_Model;

if($_SERVER['REQUEST_METHOD'] == "GET"){

    if(isset($_GET["pagina"])){

        $pagina = $_GET["pagina"];
        $lista_personas = $_personas->api_lista_personas_paginado($pagina);
        // indica que es una peticion de tipo JSON

        header("Content-Type: application/json");
        echo json_encode($lista_personas);
        // responde codigo 200 ok
        http_response_code(200);

    }else if(isset($_GET['id'])){

        $id_persona = $_GET['id'];
        $datos_persona = $_personas->api_obtener_persona($id_persona);
        header("Content-Type: application/json");
        echo json_encode($datos_persona);
        http_response_code(200);

    }else if(isset($_GET['nombre'])){

        $nombre = $_GET['nombre'];
        $datos_persona = $_personas->api_obtener_persona_nombre($nombre);
        header("Content-Type: application/json");
        echo json_encode($datos_persona);
        http_response_code(200);
   
}else if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    //recibimos los datos enviados
    $postBody = file_get_contents("php://input");
    
    //enviamos los datos al manejador
    $datosArray = $_personas->api_post($postBody);

    //delvovemos una respuesta 
     header('Content-Type: application/json');
     
     if(isset($datosArray["result"]["error_id"])){
     
        $responseCode = $datosArray["result"]["error_id"];
         http_response_code($responseCode);
     
     }else{
    
        http_response_code(200);
    
    }
    
    echo json_encode($datosArray);
    
}else if($_SERVER['REQUEST_METHOD'] == "PUT"){
      //recibimos los datos enviados
      $postBody = file_get_contents("php://input");
      //enviamos datos al manejador
      $datosArray = $_pacientes->put($postBody);
        //delvovemos una respuesta 
     header('Content-Type: application/json');
     if(isset($datosArray["result"]["error_id"])){
         $responseCode = $datosArray["result"]["error_id"];
         http_response_code($responseCode);
     }else{
         http_response_code(200);
     }
     echo json_encode($datosArray);

}else if($_SERVER['REQUEST_METHOD'] == "DELETE"){

        $headers = getallheaders();
        if(isset($headers["token"]) && isset($headers["pacienteId"])){
            //recibimos los datos enviados por el header
            $send = [
                "token" => $headers["token"],
                "pacienteId" =>$headers["pacienteId"]
            ];
            $postBody = json_encode($send);
        }else{
            //recibimos los datos enviados
            $postBody = file_get_contents("php://input");
        }
        
        //enviamos datos al manejador
        $datosArray = $_pacientes->delete($postBody);
        //delvovemos una respuesta 
        header('Content-Type: application/json');
        if(isset($datosArray["result"]["error_id"])){
            $responseCode = $datosArray["result"]["error_id"];
            http_response_code($responseCode);
        }else{
            http_response_code(200);
        }
        echo json_encode($datosArray);
       

}else{
    
    header('Content-Type: application/json');
    $datosArray = $_respuestas->error_405();
    echo json_encode($datosArray);
}

}
