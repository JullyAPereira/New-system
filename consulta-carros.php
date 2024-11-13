<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";  


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


$sql = "SELECT chassi, placa, marca, modelo, ano_fabricacao, ano_modelo, cor, valor FROM carros";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  
    while ($row = $result->fetch_assoc()) {
        echo '<div class="card">';
        echo '<h2>' . $row['marca'] . ' - ' . $row['modelo'] . '</h2>';
        echo '<p><strong>Chassi:</strong> ' . $row['chassi'] . '</p>';
        echo '<p><strong>Placa:</strong> ' . $row['placa'] . '</p>';
        echo '<p><strong>Ano de Fabricação:</strong> ' . $row['ano_fabricacao'] . '</p>';
        echo '<p><strong>Ano do Modelo:</strong> ' . $row['ano_modelo'] . '</p>';
        echo '<p><strong>Cor:</strong> ' . $row['cor'] . '</p>';
        echo '<p><strong>Valor:</strong> R$ ' . number_format($row['valor'], 2, ',', '.') . '</p>';
        echo '</div>';
    }
} else {
    echo '<p>Não há carros cadastrados.</p>';
}


$conn->close();
?>