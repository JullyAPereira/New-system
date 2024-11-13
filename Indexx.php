<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <style>
  
    body {
      font-family: Arial, sans-serif;
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
      background-image: url('https://i.pinimg.com/736x/1c/be/ed/1cbeed3c19057d9e0093a6e3fcfc80b3.jpg'); /* Imagem de fundo do banner */
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
  </style>
</head>
<body>
  <div class="navbar">
    <a href="Indexx.php">Home</a>
    <a href="cadastro-clientes.html">Cadastro de Clientes</a>
    <a href="consulta-clientes.html">Consulta de Clientes</a>
    <a href="cadastro-carros.html">Cadastrar carros</a>
  </div>


  <div class="banner">
    <h1>New System</h1>
  </div>

  <h2>Carros disponíveis:</h2>
  <br>
  <div class="carros-container">
    
   
    <?php include 'consulta-carros.php'; ?>
  </div>
</body>
</html>
