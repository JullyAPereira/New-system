<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


$nome = $_POST['firstname'];
$sobrenome = $_POST['lastname'];
$cpf = $_POST['cpf'];
$data_nascimento = $_POST['dob'];
$genero = $_POST['occupation'];
$email = $_POST['email'];
$telefone_residencial = $_POST['DDD'] . $_POST['phone'];
$telefone_comercial = $_POST['DDD'] . $_POST['phone_comercial'];
$endereco1 = $_POST['address'];
$endereco2 = $_POST['address2'];
$codigo_postal = $_POST['post'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
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