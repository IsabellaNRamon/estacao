<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estação do Ano</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Descubra a Estação do Ano</h1>
        <form method="post">
            <label for="data">Selecione uma data:</label>
            <!-- Adiciona o atributo value -->
            <input type="date" id="data" name="data" required value="<?php echo isset($_POST['data']) ? htmlspecialchars($_POST['data']) : ''; ?>">
            <button type="submit">Ver Estação</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST['data'];

            if ($data) {
                $dia = (int) date('d', strtotime($data));
                $mes = (int) date('m', strtotime($data));

                // Determinar a estação
                $estacao = '';
                $imagem = '';

                if (($mes == 12 && $dia >= 21) || $mes == 1 || $mes == 2 || ($mes == 3 && $dia < 20)) {
                    $estacao = 'Verão';
                    $imagem = 'verão.jpg';
                } elseif (($mes == 3 && $dia >= 20) || $mes == 4 || $mes == 5 || ($mes == 6 && $dia < 21)) {
                    $estacao = 'Outono';
                    $imagem = 'outono.jpg';
                } elseif (($mes == 6 && $dia >= 21) || $mes == 7 || $mes == 8 || ($mes == 9 && $dia < 23)) {
                    $estacao = 'Inverno';
                    $imagem = 'inverno.jpg';
                } elseif (($mes == 9 && $dia >= 23) || $mes == 10 || $mes == 11 || ($mes == 12 && $dia < 21)) {
                    $estacao = 'Primavera';
                    $imagem = 'primavera.jpg';
                }

                // Exibir a estação e a imagem
                echo "<div class='resultado'>
                        <h2>Estação: $estacao</h2>
                        <img src='$imagem' alt='$estacao'>
                      </div>";
            }
        }
        ?>
    </div>
</body>
</html>
