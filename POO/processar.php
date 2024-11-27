<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


$nome = strtolower($_POST['firstname']);
$sobrenome = strtolower($_POST['lastname']); 
$cpf = strtolower($_POST['cpf']);
$data_nascimento = strtolower($_POST['dob']); 
$genero = strtolower($_POST['occupation']); 
$email = strtolower($_POST['email']);
$telefone_residencial = $_POST['DDD'] . $_POST['phone'];
$telefone_comercial = $_POST['DDD'] . $_POST['phone_comercial'];
$endereco1 = strtolower($_POST['address']); 
$endereco2 = strtolower($_POST['address2']); 
$codigo_postal = strtolower($_POST['post']);
$cidade = strtolower($_POST['cidade']); 
$estado = strtolower($_POST['estado']); 
$renda = $_POST['renda']; 
$foto = ''; 

$stmt = $conn->prepare("INSERT INTO usuarios (nome, sobrenome, cpf, data_nascimento, genero, email, telefone_residencial, telefone_comercial, endereco1, endereco2, codigo_postal, cidade, estado, renda, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssssssd", $nome, $sobrenome, $cpf, $data_nascimento, $genero, $email, $telefone_residencial, $telefone_comercial, $endereco1, $endereco2, $codigo_postal, $cidade, $estado, $renda, $foto);

if ($stmt->execute()) {
    $sucesso = true;
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
</head>
<body>
    <?php if (isset($sucesso) && $sucesso): ?>
        <script>
            alert('Dados inseridos com sucesso!');
            window.location.href = 'cadastro-clientes.html';
        </script>
    <?php endif; ?>
</body>
</html>
