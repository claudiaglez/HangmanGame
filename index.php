<?php
include('game.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hangman Game</title>
</head>
<body>

<div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php
        foreach ($teclado as $letra) {
            echo '<button type="submit" name="letra" value="' . $letra . '">' . $letra . '</button>';
        }
        ?>
    </form>
</div>

<div>
<p>Palabra en progreso: <?php echo isset($_SESSION['espacios']) ? implode(" ", $_SESSION['espacios']) : ''; ?></p>
</div>



// Muestra el contador de fallos
<p>Contador de fallos: <?php echo isset($_SESSION['fallos']) ? $_SESSION['fallos'] : 0; ?></p>
<?php
    // Verifica si todas las letras han sido adivinadas
    if (array_search('_', $_SESSION['espacios']) === false) {
        echo '<p>¡Has adivinado la palabra! <a href="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">Reiniciar</a></p>';
        // Reiniciar el juego
        session_unset();
        session_destroy();
    }
    ?>
</body>
</html>


