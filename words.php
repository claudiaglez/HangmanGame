<?php

session_start();

$word = [
    "arbol",
    "casa",
    "patata",
    "gatito",
    "aeropuerto",
];



if (!isset($_SESSION['chosenWord'])) {
    // Escoge una palabra de forma aleatoria y la almacena en la sesión
    $_SESSION['chosenWord'] = $word[array_rand($word)];

    // Separa en caracteres la palabra escogida
    $_SESSION['characters'] = str_split($_SESSION['chosenWord']);

    // Nos sustituye los caracteres por _
    $_SESSION['espacios'] = array_fill(0, count($_SESSION['characters']), '_');
}

?>


