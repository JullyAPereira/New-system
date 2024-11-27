<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";  


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $chassi = $_POST['chassi'];
    $placa = $_POST['placa'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano_fabricacao = $_POST['ano_fabricacao'];
    $ano_modelo = $_POST['ano_modelo'];
    $cor = $_POST['cor'];
    $valor = $_POST['valor'];


    if (!empty($chassi) && !empty($placa) && !empty($marca) && !empty($modelo) && !empty($ano_fabricacao) && !empty($ano_modelo) && !empty($cor) && !empty($valor)) {
        

        $stmt = $conn->prepare("INSERT INTO carros (chassi, placa, marca, modelo, ano_fabricacao, ano_modelo, cor, valor) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $chassi, $placa, $marca, $modelo, $ano_fabricacao, $ano_modelo, $cor, $valor);


        if ($stmt->execute()) {

            echo "<script>
                    alert('Veículo cadastrado com sucesso!');
                    window.location.href = 'cadastro-carros.html';
                  </script>";
        } else {
            echo "Erro: " . $stmt->error;
        }


        $stmt->close();
    } else {
        echo "<script>alert('Por favor, preencha todos os campos obrigatórios.');</script>";
    }
}


$conn->close();
?>