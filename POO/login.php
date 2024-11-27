<?php
session_start(); 


$servername = "localhost";
$username = "root";
$password = "";  
$dbname = "sistema_login"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = $_POST['username'];
    $pass = $_POST['password'];


    $sql = "SELECT * FROM usuarios WHERE username = ?";  
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user); 
    $stmt->execute();
    $result = $stmt->get_result();
    
 
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        

        if ($pass == $row['password']) {
            $_SESSION['username'] = $user;  
            header("Location: index.php"); 
            exit();
        } else {
            $error_message = "Usuário ou senha inválidos!";
        }
    } else {
        $error_message = "Usuário não encontrado!";
    }
    $stmt->close();
}


$conn->close();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
       
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background-image: url('https://i.pinimg.com/736x/93/13/9b/93139bd8d26953f32e84b1aaf61ba5bb.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Inter', sans-serif; 
        }


        @keyframes slideUp {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container {
            background-color: #000000; 
            color: #fff; 
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 350px; 
            text-align: center;
            animation: slideUp 0.5s ease-out; 
            box-sizing: border-box; 
        }

        .login-container h2 {
            margin-bottom: 20px;
            font-size: 1.8em;
            color: #fff;
            text-align: center;
        }

        .login-container label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
            padding-left: 10px;
        }

        .login-container input {
            width: 100%;
            padding: 10px; 
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .login-container input[type="submit"] {
            background-color: #574d40;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            width: 50%; 
            padding: 10px 0;
            font-size: 1.2em;
            margin-left: auto;
            margin-right: auto;
        }

        .login-container input[type="submit"]:hover {
            background-color: #a06e45;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }

        
        @media (max-width: 600px) {
            .login-container {
                padding: 20px;
                width: 80%;
            }

            .login-container h2 {
                font-size: 1.5em;
            }

            .login-container input {
                padding: 10px;
            }

            .login-container input[type="submit"] {
                width: 60%;
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>

    <form action="" method="POST">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
        
        <input type="submit" value="Entrar">
    </form>
    
    <?php
   
    if (isset($error_message)) {
        echo "<p class='error-message'>$error_message</p>";
    }
    ?>
</div>

</body>
</html>
