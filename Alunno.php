<?php
    class Alunno implements JsonSerializable{
       protected $nome;
       protected $cognome;
       protected $eta;


       public function __construct($nome, $cognome, $eta){
           $this->nome =$nome;
           $this->cognome =$cognome;
           $this->eta =$eta;
       }
          


       function get_nome(){
           return $this->nome;
       }


       function set_nome($nome){
           $this->nome =$nome;
       }


       function get_cognome(){
           return $this->cognome;
       }
      
       function set_cognome($cognome){
           $this->cognome =$cognome;
       }


       function get_eta(){
           return $this->eta;
       }
      
       function set_eta($eta){
           $this->eta =$eta;
       }


       function toString(){
           return "<br> nome = " . $this->nome . " <br>cognome = " . $this->cognome . " <br>eta = " . $this->eta . "<br>";
       }

       public function jsonSerialize(){
        $a = [
            "nome"=>$this->nome,
            "cognome"=>$this->cognome,
            "eta"=>$this->eta
        ];
        return $a;
       }
   }


?>


