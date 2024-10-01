<?php
// Archivo: matematicas.php

function resolverEcuacionSegundoGrado($a, $b, $c) {
    $discriminante = $b**2 - 4*$a*$c;

    if ($discriminante < 0) {
        return [];  // Si no hay soluciones reales, devolvemos un array vacío
    } elseif ($discriminante == 0) {
        $x = -$b / (2 * $a);
        return [$x];  // Si hay una solución única, devolvemos un array con un solo valor
    } else {
        $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
        $x2 = (-$b - sqrt($discriminante)) / (2 * $a);
        return [$x1, $x2];  // Si hay dos soluciones, devolvemos un array con ambas
    }
}
?>
