<?php
//wget "https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"
//para mostrar tudo do response (header e body): curl -v -X GET https://pharaoh-genesis-robson1990.c9users.io/acao
class Recursos{
    //VEM DA URL
    private $arg1, $arg2;
    
    public function __construct($arg1=0,$arg2=0){
        $this->arg1 = $arg1;
        $this->arg2 = $arg2;
    }
    
    public function __call($m,$e){
        http_response_code(400);
        echo "Erro: chamada invalida<br>";
    }
    
    public function all(){
        foreach($_SERVER as $key => $value) {
            echo "$key => $value <br>";
        }
    }
    //GET OPTIONS
    public function hello(){
        switch ($_SERVER["REQUEST_METHOD"]) {
        case "OPTIONS":
            header('allow: GET, OPTIONS');
            http_response_code(200);
            break;
        case "GET":
            header('content-type: application/json');
            header('lol: ololl');
            echo json_encode(array("resp"=>"ola"));
            break;
        default:
            http_response_code(405);
            echo "Method not allowed";
            break;
        }
    }
}

$met = $_GET["metodo"];
$arg1 = $_GET["arg1"];
$arg2 = $_GET["arg2"];

if(isset($met) && isset($arg1) && isset($arg2)){
    $r = new Recursos($arg1,$arg2);
}elseif (isset($met) && isset($arg1)){
    $r = new Recursos($arg1);
}elseif (isset($met)) {
    $r = new Recursos();
}

$r->$met();

?>