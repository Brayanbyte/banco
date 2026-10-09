<?php
require_once "cors.php";
require_once "conexao.php";

$dados = json_decode(file_get_contents("php://input"), true);

// Valida se o ID do aluno foi informado
if (!isset($dados['id_alunos'])) {
    http_response_code(400);
    echo json_encode(["erro" => "O campo id_alunos é obrigatório para desativação."]);
    exit;
}

try {
    // Realiza a exclusão lógica mudando o status usando a chave id_alunos
    $sql = "UPDATE alunos SET status = 'INATIVA' WHERE id_alunos = :id_alunos";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_alunos', $dados['id_alunos']);
    $stmt->execute();

    echo json_encode(["mensagem" => "Matrícula do aluno desativada com sucesso!"]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro ao desativar aluno.", "detalhes" => $e->getMessage()]);
}
?>
