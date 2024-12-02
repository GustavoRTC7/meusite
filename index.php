<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Clínica Médica</title>
</head>

<body>

    <div class="container mt-5">
        <?php
        // Exibir mensagens de sucesso ou erro se existirem
        if (isset($_GET['sucesso'])) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>" . htmlspecialchars($_GET['sucesso']) . 
                "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }
        if (isset($_GET['erro'])) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>" . htmlspecialchars($_GET['erro']) . 
                "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }

        // Verificar se a página foi especificada na URL
        if (isset($_GET['page'])) {
            $page = basename($_GET['page']); // Evitar injeção de caminho malicioso
            $file = $page . '.php';

            // Verificar se o arquivo existe no servidor
            if (file_exists($file)) {
                include $file;
            } else {
                include 'home.php'; // Página padrão ou de erro 404
            }
        } else {
            include 'home.php'; // Página inicial padrão
        }
        ?>
    </div>

</body>
</html>
