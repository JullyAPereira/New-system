<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        echo "Cliente excluído com sucesso.";
    } else {
        echo "Erro ao excluir o cliente: " . $stmt->error;
    }
    $stmt->close();
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];

  
    $sql = "SELECT id, nome, cpf, data_nascimento, email, telefone_residencial, renda, foto FROM usuarios WHERE nome LIKE ?";
    $stmt = $conn->prepare($sql);
    $nome_param = "%" . $nome . "%";
    $stmt->bind_param("s", $nome_param);

    
    $stmt->execute();
    $result = $stmt->get_result();

    
    while ($row = $result->fetch_assoc()) {
        $renda = (float)$row['renda'];
        $status = ($renda * 0.3 < 500) ? "<span class='status-reprovado'>Reprovado</span>" : "<span class='status-aprovado'>Aprovado</span>";

        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
        echo "<td>" . htmlspecialchars($row['cpf']) . "</td>";
        echo "<td>" . htmlspecialchars($row['data_nascimento']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['telefone_residencial']) . "</td>";
        echo "<td>R$ " . number_format($renda, 2, ',', '.') . "</td>";
        echo "<td>" . $status . "</td>";
        
        if (!empty($row['foto'])) {
            echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['foto']) . "' alt='Foto'></td>";
        } else {
            echo "<td>Sem foto</td>";
        }

        echo "<td><button class='delete-btn' onclick='apagarCliente(" . $row['id'] . ")'>Apagar</button></td>";
        echo "</tr>";
    }


    $stmt->close();
}


$conn->close();
?>
