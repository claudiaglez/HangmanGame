<?php
session_start();

// Verifica si se debe reiniciar el juego
if (!isset($_SESSION['chosenWord']) || array_search('_', $_SESSION['espacios']) === false) {
    $_SESSION['wordList'] = [
        "arbol",
        "casa",
        "patata",
        "gatito",
        "aeropuerto",
    ];

    $_SESSION['chosenWord'] = $_SESSION['wordList'][array_rand($_SESSION['wordList'])];
    $_SESSION['characters'] = str_split(strtoupper($_SESSION['chosenWord']));
    $_SESSION['espacios'] = [];
    $_SESSION['espacios'] = array_fill(0, count($_SESSION['characters']), '_');
   if (!isset($_SESSION['mistakes'])) {
        $_SESSION['mistakes'] = 0;
    } else {
        // Si ya existe, incrementa el contador de mistakes para evitar que comience en 1
        $_SESSION['mistakes']++;
    }
    
}


$keyboard= range('A', 'Z');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['letter'])) {
    $chosenLetter = strtoupper($_POST['letter']);
    echo "letter elegida: $chosenLetter<br>";

    if (in_array($chosenLetter, $_SESSION['characters'])) {
        echo "La letter está en la palabra<br>";
        for ($i = 0; $i < count($_SESSION['characters']); $i++) {
            if ($_SESSION['characters'][$i] === $chosenLetter) {
                $_SESSION['espacios'][$i] = $chosenLetter;
            }
        }
    } else {
        echo "La letter NO está en la palabra<br>";
        $_SESSION['mistakes']++;

        // Puedes ajustar el número 6 según el número máximo de mistakes antes de reiniciar el juego
        if ($_SESSION['mistakes'] >= 6) {
            // El jugador ha perdido, puedes realizar acciones adicionales aquí
            echo "¡Has perdido!";
            // Reiniciar el juego
            session_unset();
            session_destroy();
        }
    }


}
?>





