<?php
session_start();

// Verifica si se debe reiniciar el juego
if (!isset($_SESSION['chosenWord']) || array_search('_', $_SESSION['espacios']) === false) {
    $_SESSION['wordList'] = [
        "croacia",
        "alemania",
        "francia",
        "italia",
        "colombia",
        "chile",
        "argentina",
        "venezuela",
        "polonia",
        "brasil",
        "suecia",
    ];

    $_SESSION['chosenWord'] = $_SESSION['wordList'][array_rand($_SESSION['wordList'])];
    $_SESSION['characters'] = str_split(strtoupper($_SESSION['chosenWord']));
    $_SESSION['espacios'] = [];
    $_SESSION['espacios'] = array_fill(0, count($_SESSION['characters']), '_');
   if (!isset($_SESSION['mistakes'])) {
        $_SESSION['mistakes'] = 0;
    } else {
        $_SESSION['mistakes']++;
    }
    
}


$keyboard= range('A', 'Z');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['letter'])) {
    $chosenLetter = strtoupper($_POST['letter']);
 

    if (in_array($chosenLetter, $_SESSION['characters'])) {
      
        for ($i = 0; $i < count($_SESSION['characters']); $i++) {
            if ($_SESSION['characters'][$i] === $chosenLetter) {
                $_SESSION['espacios'][$i] = $chosenLetter;
            }
        }
    } else {
      ;
        $_SESSION['mistakes']++;
        if ($_SESSION['mistakes'] >= 6) {
            echo '<p class="wordMistaken">¡Has perdido!</p>';

            session_unset();
            session_destroy();
        }
    }


}
?>





