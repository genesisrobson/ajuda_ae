<?php

class ProjetoDAO{
    public function insert(Produto $p){
        $mysqli = new mysqli("127.0.0.1", "genesis_robson19", "", "ajuda_ae");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("INSERT INTO Produto(nome,valor) VALUES (?,?)");
        $stmt->bind_param("isssssds",$p->getNome(),$p->getValor(),$p->getPropositor(),$p->getObjetivo(),$p->getCidade(),$p->getEstado(),$p->getvlMeta(),$p->getDeadline());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    
    public function getProject($nome){
        $mysqli = new mysqli("127.0.0.1", "genesis_robson19", "", "ajuda_ae");
        $stmt = $mysqli->prepare("SELECT * FROM Produto WHERE nome=?");
        $stmt->bind_param("s",$nome);
        $stmt->execute();
        $stmt->bind_result($id,$nome, $valor);
        $stmt->fetch();
        $prod = new Produto($id,$nome,$valor);
        return $prod;
    }
    //$stmt->bind_result($col1, $col2);
}
?>