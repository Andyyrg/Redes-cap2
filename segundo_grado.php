<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolver Ecuación de Segundo Grado</title>
</head>
<body>
    <h1>Calculadora de Ecuaciones de Segundo Grado</h1>

    <form method="POST" action="">
        <label for="a">Coeficiente a:</label>
        <input type="number" step="any" name="a" id="a" required><br><br>

        <label for="b">Coeficiente b:</label>
        <input type="number" step="any" name="b" id="b" required><br><br>

        <label for="c">Coeficiente c:</label>
        <input type="number" step="any" name="c" id="c" required><br><br>

        <input type="submit" value="Calcular">
    </form>

    <?php
    // Verificar si se han enviado los datos
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener los valores del formulario
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];

        // Llamar a la función para resolver la ecuación
        soluc($a, $b, $c);
    }

    // Función para resolver la ecuación de segundo grado
    function soluc($a, $b, $c) {
        // Validar si 'a' no es 0 para evitar división entre 0
        if ($a == 0) {
            echo "El coeficiente 'a' no puede ser cero en una ecuación cuadrática.";
            return;
        }

        // Calcular el discriminante (b^2 - 4ac)
        $delta = ($b * $b) - (4 * $a * $c);

        if ($delta < 0) {
            // No tiene soluciones reales
            echo "La ecuación no tiene soluciones reales.";
        } elseif ($delta == 0) {
            // Una solución real doble
            $x = -$b / (2 * $a);
            echo "La ecuación tiene una única solución real: x = " . $x;
        } else {
            // Dos soluciones reales
            $x1 = (-$b + sqrt($delta)) / (2 * $a);
            $x2 = (-$b - sqrt($delta)) / (2 * $a);
            echo "La ecuación tiene dos soluciones reales: x1 = " . $x1 . " y x2 = " . $x2;
        }
    }
    ?>
</body>
</html>
