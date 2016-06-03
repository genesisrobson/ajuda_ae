<?php

abstract class GeneralResource{
    
    public function __call($m,$e){
        header('content-type: application/json');
        echo json_encode(array("response"=>"Recurso inexistente $m"));
        http_response_code(404);   
    }
    
}

class GeneralResourceGET extends GeneralResource{
    public function ola(){
        echo "ola";
    }
    
    
    public function project(){
        $arg1 = $_GET["arg1"];
        header('content-type: application/json');
        if($arg1 != null){
            require_once "model/projeto.php";
            require_once "model/projetoDAO.php";
            $pj = new ProjetoDAO();
            $proj = $pj->getProjeto($arg1);
            if($proj->getNome() != null && $proj->getPropositor() && $proj->getObjetivo() && $proj->getCidade() && $proj->getEstado() && $proj->getvlMeta() && $proj->getDeadline()){
                echo json_encode(array("nome"=>$proj->getNome(), "propositor"=>$proj->getPropositor(), "objetivo"=>$proj->getObjetivo(), "cidade"=>$proj->getCidade(), "estado"=>$proj->getEstado(), "meta"=>$proj->getvlMeta(), "data final"=>$proj->getDeadline()));
                http_response_code(200);
            }else{
                echo json_encode(array("response"=>"Produto nao encontrado"));
                http_response_code(404);
            }
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500); 
        }
    }
    
}
?>