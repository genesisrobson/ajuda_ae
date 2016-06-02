<?php

abstract class GeneralResource{
    
    public function __call($m,$e){
        header('content-type: application/json');
        echo json_encode(array("response"=>"Recurso inexistente $m"));
        http_response_code(404);   
    }
    
}

class GeneralResourceGET extends GeneralResource{
    
    public function projeto(){
        $arg1 = $_GET["arg1"];
        header('content-type: application/json');
        if($arg1 > 0){
            require_once "../model/projeto.php";
            //require_once "../model/produtoDAO.php";
            //$pd = new ProdutoDAO();
            $prod = $pd->getProduct($arg1);
            if($prod->getId() != null &&  $prod->getNome() != null && $prod->getValor() != null){
                echo json_encode(array("id"=>$prod->getId(), "nome"=>$prod->getNome(), "valor"=>$prod->getValor()));
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
    
    public function hello(){
        header('content-type: application/json');
        header('lol: ololl');
        echo json_encode(array("resp"=>"ola"));
        http_response_code(200);
    }
    
}

class GeneralResourcePOST extends GeneralResource{
    
    public function produto(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            //CUIDADO
            require_once "../model/produto.php";
            require_once "../model/produtoDAO.php";
            $produto = new Produto(0,$array["nome"],$array["valor"]);
            $pd = new ProdutoDAO();
            $pd->insert($produto);
            echo json_encode(array("response"=>"Criado"));
            http_response_code(200);   
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500);   
        }
    }

}

class GeneralResourceDELETE extends GeneralResource{
    $curl = curl_init($url . "/Contacts/{$recordId}");
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json',"OAuth-Token: $token"));
    
    // Make the REST call, returning the result
    $response = curl_exec($curl);
    if (!$response) {
        die("Connection Failure.n");
    }
}

class GeneralResourcePUT extends GeneralResource{
    $curl = curl_init($url . "/Contacts/{$recordId}");
    $data = array(
      'first_name' => 'John',
      );
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json',"OAuth-Token: $token"));
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    
    // Make the REST call, returning the result
    $response = curl_exec($curl);
    if (!$response) {
        die("Connection Failure.n");
    }
}

/*
class GeneralResourceOPTIONS extends GeneralResource{
    
    public function hello(){
        header('allow: GET, OPTIONS');
        http_response_code(200); 
    }
    
    public function produto(){
        header('allow: POST, OPTIONS');
        http_response_code(200); 
    }
    
}
*/
?>