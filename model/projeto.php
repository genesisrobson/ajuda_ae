<?php

class Projeto{
    private $nome, $propositor, $objetivo, $cidade, $estado, $vlMeta, $deadline; #$id, $nome, $valor;
    
    //public function __construct($id=0, $nome, $valor){
    public function __construct($nome, $propositor, $objetivo, $cidade, $estado, $vlMeta, $deadline){
        $this->nome = $nome;
        $this->propositor = $propositor;
        $this->objetivo = $objetivo;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->vlMeta = $vlMeta;
        $this->deadline = $deadline;
        //$this->id = $id;
        //$this->nome = $nome;
        //$this->valor = $valor;
    }
    
    /*public function getId(){
        return $this->id;
    }*/
    
    public function getNome(){
        return $this->nome;
    }
    
    public function getPropositor(){
        return $this->propositor;
    }
    
    public function getObjetivo(){
        return $this->objetivo;
    }

    public function getCidade(){
        return $this->cidade;
    }    

    public function getEstado(){
        return $this->estado;
    }
    
    public function getvlMeta(){
        return $this->vlMeta;
    }
    
    public function getDeadline(){
        return $this->deadline;
    }

}

?>