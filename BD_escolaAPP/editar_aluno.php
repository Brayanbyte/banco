<?php
require_once "cors.php";
require_once "conexao.php";

$dados = json_decode(file_get_contents("php://input"), true);

// Valida se o ID do aluno foi enviado
if (!isset($dados['id_alunos'])) {
    http_response_code(400);
    echo json_encode(["erro" => "O campo id_alunos é obrigatório para edição."]);
    exit;
}

try {
    // Atualiza os dados principais com base no id_alunos
    $sql = "UPDATE alunos SET 
                nome = :nome, 
                cpf = :cpf, 
                data_de_nascimento = :data_de_nascimento, 
                email = :email, 
                id_curso = :id_curso 
            WHERE id_alunos = :id_alunos";
            
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':nome', $dados['nome']);
    $stmt->bindParam(':cpf', $dados['cpf']);
    $stmt->bindParam(':data_de_nascimento', $dados['data_de_nascimento']);
    $stmt->bindParam(':email', $dados['email']);
    $stmt->bindParam(':id_curso', $dados['id_curso']);
    $stmt->bindParam(':id_alunos', $dados['id_alunos']);
    
    $stmt->execute();

    echo json_encode(["mensagem" => "Dados do aluno atualizados com sucesso!"]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro ao atualizar aluno.", "detalhes" => $e->getMessage()]);
}
?>
