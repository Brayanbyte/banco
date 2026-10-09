<?php
require_once "conexao.php";

// Avisa o aplicativo (React Native) que o PHP vai devolver dados em formato JSON
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *"); // Permite que o Expo Snack acesse a API sem travar no CORS

try {
    // Busca os dados respeitando os nomes exatos das colunas da sua tabela 'alunos'
    $sql = "SELECT id_alunos, nome, cpf, data_de_nascimento, email, id_curso FROM alunos ORDER BY nome";
    $stmt = $pdo->query($sql);
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Transforma a lista de alunos do MySQL em formato JSON
    echo json_encode($alunos);
} catch (PDOException $e) {
    echo json_encode(["erro" => $e->getMessage()]);
}
?>
