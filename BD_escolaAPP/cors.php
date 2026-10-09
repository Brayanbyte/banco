<?php
// 1. Ativa as permissões de segurança para comunicação com o React Native/Expo
require_once "cors.php";

// 2. Inclui a conexão PDO com o banco de dados 'escola'
require_once "conexao.php";

try {
    // 3. Prepara a consulta SQL para buscar os alunos do seu banco
    $sql = "SELECT id, nome, status FROM alunos ORDER BY nome";
    $stmt = $pdo->query($sql);
    
    // 4. Organiza os registros retornados em uma lista (Array Associativo)
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // 5. Envia os dados dos alunos de volta para o aplicativo em formato JSON
    echo json_encode($alunos);

} catch (PDOException $e) {
    // Caso ocorra algum erro na conexão ou no banco de dados, retorna uma mensagem segura
    http_response_code(500);
    echo json_encode([
        "erro" => "Não foi possível listar os alunos.",
        "detalhes" => $e->getMessage()
    ]);
}
?>
