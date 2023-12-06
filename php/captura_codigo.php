<?php
include("conexao.php");
session_start();

// Consulta SQL para buscar o email na tabela
$stmt = $conn->prepare("SELECT nr_verificacao FROM tb_usuario WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();

// Verifica se há resultados
if ($stmt->rowCount() > 0) {
  $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
  $nr_verificacao = $resultado['nr_verificacao'];
  echo $nr_verificacao;
} else {
  // Se não houver resultados, exibe "erro"
  echo "erro";
}
