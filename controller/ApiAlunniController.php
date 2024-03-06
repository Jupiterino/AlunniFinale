<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
require_once 'Classe.php';


class ApiAlunniController{

    function index(Request $request, Response $response, $args) {
        $classroom = new Classe();
        $response->getBody()->write (json_encode( $classroom ));
        return $response->withHeader("Content-Type","application/json")->withStatus(200); 
     }

     function show(Request $request, Response $response, $args) {
        $classe  = new Classe();
        $alunno = $classe->search($args["nome"]);
        //$errore = 0;
        if($alunno != null){
            $response->getBody()->write(json_encode( $alunno ));
            return $response->withHeader("Content-Type","application/json")->withStatus(200);
        }
        else{
            $response->getBody()->write("{'err': 'ERRORE NON TROVATO'}");
            return $response->withHeader("Content-Type","application/json")->withStatus(404);
            
        }
 
     }
}

?>