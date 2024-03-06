<?php
require_once ("./Alunno.php");

class Classe implements JsonSerializable{
    private $alunni = [];
    private $nome;

   public function __construct(){
        $this->nome = "5 CIA";
        $A1 = new Alunno("Thomas" , "Morreale" , 18);
        $A2 = new Alunno("Alexandru" , "Botez" , 18);
        $A3 = new Alunno("Maverik" , "Iriarte" , 39);
        $A4 = new Alunno("Alessio" , "Pan" , 19);

        $this->alunni = array($A1, $A2, $A3, $A4);
   }


   public function toString(){
       $s="";
       foreach($this->alunni as $x){
           $s = $s . $x -> toString();
       }
       return $s;
   }
   
   function search($nome){
    for($i=0; $i<count($this->alunni); $i++){
         if($this->alunni[$i]->get_nome() == $nome)
             return $this->alunni[$i];

       
    }
    return null;
}
function delete($nome){
    for($i=0; $i<count($this->alunni); $i++){
         if($this->alunni[$i]->get_nome() == $nome)
             break;

       
    }
    if($i<count($this->array))
        unset($this->array[$i]);
    return null;
}


   public function jsonSerialize(){
    $a = [
        "nome"=>$this->nome,
        "alunni"=>$this->alunni
    ];
    return $a;
   }

  
}


?>