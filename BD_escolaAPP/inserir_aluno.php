<?php
require_once "cors.php";
require_once "conexao.php";

// Recebe os dados em formato JSON do front-end
$dados = json_decode(file_get_contents("php://input"), true);

// Validação dos campos obrigatórios que aparecem preenchidos na sua tabela
if (!isset($dados['nome']) || !isset($dados['cpf']) || !isset($dados['id_curso'])) {
    http_response_code(400);
    echo json_encode(["erro" => "Os campos nome, cpf e id_curso são obrigatórios."]);
    exit;
}

try {
    // Monta a query usando os nomes exatos das colunas da sua tabela
    $sql = "INSERT INTO alunos (id_dados, id_ruas, cpf, nome, data_de_nascimento, email, id_curso, status) 
            VALUES (NULL, NULL, :cpf, :nome, :data_de_nascimento, :email, :id_curso, 'ATIVA')";
            
    $stmt = $pdo->prepare($sql);
    
    // Vincula os parâmetros enviados pelo aplicativo
    $stmt->bindParam(':cpf', $dados['cpf']);
    $stmt->bindParam(':nome', $dados['nome']);
    $stmt->bindParam(':data_de_nascimento', $dados['data_de_nascimento']);
    $stmt->bindParam(':email', $dados['email']);
    $stmt->bindParam(':id_curso', $dados['id_curso']);
    
    $stmt->execute();

    http_response_code(201);
    echo json_encode([
        "mensagem" => "Aluno cadastrado com sucesso!", 
        "id_alunos" => $pdo->lastInsertId()
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro ao cadastrar aluno.", "detalhes" => $e->getMessage()]);
}
?>
