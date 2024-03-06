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

     function update(Request $request, Response $response, $args){
        $body = $request->getBody()->getContents();
        $parsedBody = json_decode($body, true);
        $Classe = new Classe;

        $alunno = $Classe->search($args["nome"]);

        $nome = $parsedBody['nome'];
        $cognome = $parsedBody['cognome'];
        $eta = $parsedBody['eta'];

        $response->$getBody()->write($parsedBody('alunno'));
        return $response->withHeader('Content-Type' , 'application/json')->withStatus(201);

     }

     function delete(Request $request, Response $response, $args){
        $body = $request->getBody()->getContents();
        $parsedBody = json_decode($body, true);
        $Classe = new Classe;

        $alunno = $Classe->search($args["nome"]);
        
        $nome = $parsedBody['nome'];
        $cognome = $parsedBody['cognome'];
        $eta = $parsedBody['eta'];

        $response->$getBody()->write($parsedBody('alunno'));
        return $response->withHeader('Content-Type' , 'application/json')->withStatus(201);

     }
}

?>