<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    body {
      font-family: 'Inter', sans-serif; 
      background-color: #e0e0e0;
      margin: 0;
      padding: 0;
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

    .banner {
      position: relative;
      height: 300px;
      background-image: url('https://i.pinimg.com/736x/1c/be/ed/1cbeed3c19057d9e0093a6e3fcfc80b3.jpg'); 
      background-size: cover;
      background-position: center;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
    }

    .banner::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5); 
      z-index: 1;
    }

    .banner h1 {
      font-size: 3em;
      z-index: 2;
    }

    .carros-container {
      padding: 20px;
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
      margin-top: 20px;
    }

    .carros-container h2 {
      text-align: center;
      font-size: 2em;
      color: #333;
      margin-bottom: 20px;
    }

    .card {
      background-color: #f9f9f9;
      border-radius: 5px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      width: 300px;
      padding: 20px;
      margin: 10px;
      text-align: center;
    }

    .card h2 {
      font-size: 1.2em;
      color: #333;
    }

    .card p {
      color: #666;
    }

    .carros {
      display: flex;
      justify-content: center; 
      align-items: center;    
      height: 100vh;  
      padding: 20px;
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

  <div class="banner">
    <h1>New System</h1>
  </div>

  <div class="carros">
    <h2>Carros disponíveis:</h2>
    <div class="carros-container">
      <?php include 'consulta-carros.php'; ?>
    </div>
  </div>
</body>
</html>
