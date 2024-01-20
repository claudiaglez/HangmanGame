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
    $_SESSION['espacios'] = array_fill(0, count($_SESSION['characters']), '_');
    $_SESSION['fallos'] = 0;  // Inicializa el contador de fallos
}

$teclado = range('A', 'Z');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['letra'])) {
    $letraElegida = strtoupper($_POST['letra']);
    echo "Letra elegida: $letraElegida<br>";

    if (in_array($letraElegida, $_SESSION['characters'])) {
        echo "La letra está en la palabra<br>";
        for ($i = 0; $i < count($_SESSION['characters']); $i++) {
            if ($_SESSION['characters'][$i] === $letraElegida) {
                $_SESSION['espacios'][$i] = $letraElegida;
            }
        }
    } else {
        echo "La letra NO está en la palabra<br>";
        $_SESSION['fallos']++;

        // Puedes ajustar el número 6 según el número máximo de fallos antes de reiniciar el juego
        if ($_SESSION['fallos'] >= 6) {
            // El jugador ha perdido, puedes realizar acciones adicionales aquí
            echo "¡Has perdido!";
            // Reiniciar el juego
            session_unset();
            session_destroy();
        }
    }

    var_dump($_SESSION); // Mostrará el contenido de la sesión
}
?>





