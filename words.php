<?php
$word = [
    "arbol",
    "casa",
    "patata",
    "gatito",
    "aeropuerto",
];


// Crea un array de 2 palabras de forma aleatoria
$wordsRandom = array_rand($word, 2); 

// Escoge una palabra de wordsRandom
$chosenWord = $word[$wordsRandom[0]];

// Separa en caracteres la palabra escogida
$characters = str_split($chosenWord);
//print_r($characters);

// Nos sustituye los caracteres por _
$espacios = array_fill(0, count($characters), '_');
//print_r(implode(' ', $espacios));

?>


