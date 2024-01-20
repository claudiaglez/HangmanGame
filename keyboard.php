<?php
$keyboard = range('A', 'Z');


if (isset($_POST['letra'])) {
    $letraElegida = strtoupper($_POST['letra']);

    // Verifica si la letra está en la palabra y actualiza el estado
    if (in_array($letraElegida, $_SESSION['characters'])) {
        for ($i = 0; $i < count($_SESSION['characters']); $i++) {
            if ($_SESSION['characters'][$i] === $letraElegida) {
                $_SESSION['espacios'][$i] = $letraElegida;
            }
        }
    }
}
?>



