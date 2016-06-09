<?php

class ProjetoDAO{
    public function insert(Projeto $p){
        $mysqli = new mysqli("127.0.0.1", "genesis_robson19", "", "ajuda_ae");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("INSERT INTO tabela_vaquinha(nome,propositor,objetivo,cidade,estado,vlMeta,deadline) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssds",$p->getNome(),$p->getPropositor(),$p->getObjetivo(),$p->getCidade(),$p->getEstado(),$p->getvlMeta(),$p->getDeadline());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    
    public function getProjeto($nome){
        $mysqli = new mysqli("127.0.0.1", "genesis_robson19", "", "ajuda_ae");
        $stmt = $mysqli->prepare("SELECT * FROM tabela_vaquinha WHERE nome=?");
        $stmt->bind_param("s",$nome);
        $stmt->execute();
        $stmt->bind_result($id,$nome, $propositor, $objetivo, $cidade, $estado, $vlMeta, $deadline);
        $stmt->fetch();
        $proj = new Projeto($id,$nome, $propositor, $objetivo, $cidade, $estado, $vlMeta, $deadline);
        return $proj;
    }
    
    public function deletar($id){
        $mysqli = new mysqli("127.0.0.1", "genesis_robson19", "", "ajuda_ae");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("DELETE FROM tabela_vaquinha WHERE id=?");
        $stmt->bind_param("i",$id);
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    
    public function deletar($id){
        $mysqli = new mysqli("127.0.0.1", "genesis_robson19", "", "ajuda_ae");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("UPDATE FROM tabela_vaquinha WHERE id=?");
        $stmt->bind_param("i",$id);
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }

    //$stmt->bind_result($col1, $col2);
}
?>