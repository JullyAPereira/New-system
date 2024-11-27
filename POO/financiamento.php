<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$chassi = $_GET['chassi']; // Recebe o parâmetro da URL

$sql = "SELECT * FROM carros WHERE chassi = '$chassi'";
$result = $conn->query($sql);
$carro = $result->fetch_assoc();

if (!$carro) {
    echo "Carro não encontrado.";
    exit();
}

// Simulação do financiamento
$valor = $carro['valor'];
$entrada = $valor * 0.20; // 20% de entrada
$parcelas = 36; // 36 vezes
$juros = 0.02; // Juros de 2% ao mês

$valor_financiado = $valor - $entrada;
$parcela = ($valor_financiado * (1 + $juros * $parcelas)) / $parcelas;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulação de Financiamento</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e0e0e0;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            color: #f2f2f2;
            padding: 14px 20px;
            text-decoration: none;
            display: inline-block;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .content {
            padding: 20px;
        }

        .carro-info {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .carro-info h2 {
            margin-top: 0;
        }

        .carro-info p {
            margin: 5px 0;
        }

        .simulacao {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .simulacao h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="cadastro-clientes.html">Cadastro de Clientes</a>
        <a href="consulta-clientes.html">Consulta de Clientes</a>
        <a href="cadastro-carros.html">Cadastrar carros</a>
        <a href="logout.php">Sair</a>
    </div>

    <div class="content">
        <div class="carro-info">
            <h2><?php echo $carro['marca'] . ' - ' . $carro['modelo']; ?></h2>
            <p><strong>Chassi:</strong> <?php echo $carro['chassi']; ?></p>
            <p><strong>Placa:</strong> <?php echo $carro['placa']; ?></p>
            <p><strong>Ano de Fabricação:</strong> <?php echo $carro['ano_fabricacao']; ?></p>
            <p><strong>Ano do Modelo:</strong> <?php echo $carro['ano_modelo']; ?></p>
            <p><strong>Cor:</strong> <?php echo $carro['cor']; ?></p>
            <p><strong>Valor:</strong> R$ <?php echo number_format($carro['valor'], 2, ',', '.'); ?></p>
        </div>

        <div class="simulacao">
            <h3>Simulação de Financiamento</h3>
            <p><strong>Valor do Carro:</strong> R$ <?php echo number_format($valor, 2, ',', '.'); ?></p>
            <p><strong>Entrada (20%):</strong> R$ <?php echo number_format($entrada, 2, ',', '.'); ?></p>
            <p><strong>Valor Financiado:</strong> R$ <?php echo number_format($valor_financiado, 2, ',', '.'); ?></p>
            <p><strong>Parcelas (36x):</strong> R$ <?php echo number_format($parcela, 2, ',', '.'); ?> por mês</p>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
