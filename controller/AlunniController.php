<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
require_once 'Classe.php';


class AlunniController{

    function index(Request $request, Response $response, $args) {
        $classroom = new Classe();
        $response->getBody()->write( $classroom->toString() );
        return $response; 
     }

     function show(Request $request, Response $response, $args) {
        $classe  = new Classe();
        $alunno = $classe->search($args["nome"]);
        
        if($alunno != null){
            $message = $alunno -> toString();
        }
        else{
            $message = "errore";
        }

        $response->getBody()->write($message);
        return $response;
     }
}

?>