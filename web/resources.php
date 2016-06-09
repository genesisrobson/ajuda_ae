<?php

abstract class GeneralResource{
    
    public function __call($m,$e){
        header('content-type: application/json');
        echo json_encode(array("response"=>"$m eh um Recurso inexistente!"));
        http_response_code(404);   
    }
}

class GeneralResourceGET extends GeneralResource{
    public function ola(){
        echo "ola";
    }
    
    
    public function projetoGET(){
        $arg1 = $_GET["arg1"];
        header('content-type: application/json');
        if($arg1 != null){
            require_once "../model/projeto.php";
            require_once "../model/projetoDAO.php";
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
            echo json_encode(array("response"=>"Dados invalidos"));
            http_response_code(500); 
        }
    }
    
}

class GeneralResourcePOST extends GeneralResource{
    
    public function projetoPOST(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            require_once "../model/projeto.php";
            require_once "../model/projetoDAO.php";
            $projeto = new Projeto(0,$array["nome"],$array["propositor"],$array["objetivo"],$array["cidade"],$array["estado"],$array["meta"],$array["deadline"]);
            $pj = new ProjetoDAO();
            $pj->insert($projeto);
            echo json_encode(array("response"=>"Cadastrado"));
            http_response_code(200);
        }else{
            echo json_encode(array("response"=>"Dados invalidos"));
            http_response_code(500);   
        }
    }

}

class GeneralResourceDELETE extends GeneralResource{
    
    public function deletarProjeto(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            require_once "../model/projeto.php";
            require_once "../model/projetoDAO.php";
            $pj = new ProjetoDAO();
            $proj = $pj->deletar($_GET['arg1']);
            echo json_encode(array("response"=>"Deletado"));
            http_response_code(200);
            
        }else{
            echo json_encode(array("response"=>"Dados invalidos"));
            http_response_code(500);   
        }
    }
}


/*
class GeneralResourcePUT extends GeneralResource{
    
    public function alterarProduto(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            //CUIDADO
            require_once "model/produto.php";
            require_once "model/produtoDAO.php";
            $produto = new Produto($_GET['arg1'],$array["nome"],$array["valor"]);
            $pd = new ProdutoDAO();
            $prod = $pd->alter($produto);
            echo json_encode(array("id"=>$prod->getId(), "nome"=>$prod->getNome(), "valor"=>$prod->getValor()));
            http_response_code(200);
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500);   
        }
    }
}*/
?>