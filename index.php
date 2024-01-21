<?php
include('game.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Hangman Game</title>
</head>
<body>
<div class="containerGame">

<h1>The Travel Hangman Game</h1>

<h3>Piensa en un país...</h3>

<div class="containerKeyboard">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php
        foreach ($keyboard as $letter) {
            echo '<button type="submit" name="letter" value="' . $letter . '">' . $letter . '</button>';
        }
        ?>
    </form>
</div>

<div class="containerWord">
<p>Palabra en progreso: <?php echo isset($_SESSION['espacios']) ? implode(" ", $_SESSION['espacios']) : ''; ?></p>
</div>

<div class="containerMistakes">
<p>Contador de fallos: <?php echo isset($_SESSION['mistakes']) ? $_SESSION['mistakes'] : 0; ?></p>
</div>
</div>
<?php
    if (array_search('_', $_SESSION['espacios']) === false) {
        echo '<p class="wordCorrect">¡Has adivinado la palabra! <a href="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">Reiniciar</a></p>';  
        session_unset();
        session_destroy();
    }
    ?>
</body>
</html>


