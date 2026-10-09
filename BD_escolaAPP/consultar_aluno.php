<?php
require_once "cors.php";
require_once "conexao.php";

try {
    // Seleciona usando a chave primária correta: id_alunos
    $sql = "SELECT id_alunos, id_dados, id_ruas, cpf, nome, data_de_nascimento, email, id_curso, status 
            FROM alunos 
            WHERE status = 'ATIVA' 
            ORDER BY nome";
            
    $stmt = $pdo->query($sql);
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($alunos);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro ao consultar alunos.", "detalhes" => $e->getMessage()]);
}
?>
