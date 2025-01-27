<?php
// Simulação de usuários cadastrados
$usuarios = [
    ['login' => 'victor', 'senha' => 'victor'],
    ['login' => 'julio', 'senha' => 'julio'],
    ['login' => 'admin', 'senha' => 'admin']
];

// Variáveis para mensagens e validações
$mensagem = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario']);
    $senha = trim($_POST['senha']);
    $valido = false;

    foreach ($usuarios as $user) {
        if ($user['login'] === $usuario && $user['senha'] === $senha) {
            $valido = true;
            break;
        }
    }

    if ($valido) {
        $mensagem = "<p style='color: green;'>Login realizado com sucesso!</p>";
        // Redirecionar para outra página
        // header("Location: home.php");
        // exit;
    } else {
        $mensagem = "<p style='color: red;'>Usuário ou senha incorretos!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Rei do Salgado - Login</title>
    <style>
        button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #766cb2;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        button:active {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="https://www.mishainfotech.com/images/InventoryManagement.png" alt="Imagem de Estoque">
        </div>
        <div class="form">
            <h1>Rei do Salgado</h1>
            <form method="POST" action="">
                <div class="form-header">
                    <div class="title">
                        <h1>Login</h1>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="usuario">Usuário</label>
                        <input id="usuario" type="text" name="usuario" placeholder="Digite seu usuário" required>
                    </div>
                    <br>
                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required>
                    </div>
                </div>
                <button type="submit">Logar</button>
            </form>
            <!-- Mensagem de validação -->
            <?php if (!empty($mensagem)) echo $mensagem; ?>
        </div>
    </div>
</body>
</html>
