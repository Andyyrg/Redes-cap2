<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolver Ecuación de Segundo Grado</title>
</head>
<body>
    <h2>Resolver Ecuación de Segundo Grado</h2>

    <!-- Formulario para ingresar los coeficientes -->
    <form method="POST">
        <label for="a">Coeficiente a:</label>
        <input type="number" name="a" step="any" required><br><br>

        <label for="b">Coeficiente b:</label>
        <input type="number" name="b" step="any" required><br><br>

        <label for="c">Coeficiente c:</label>
        <input type="number" name="c" step="any" required><br><br>

        <button type="submit">Resolver</button>
    </form>

    <?php
    // Función que resuelve la ecuación cuadrática y devuelve un array con las soluciones
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

    // Si el formulario ha sido enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];

        // Validamos que el coeficiente 'a' no sea 0
        if ($a == 0) {
            echo "<p>El coeficiente 'a' no puede ser cero en una ecuación de segundo grado.</p>";
        } else {
            // Llamamos a la función y obtenemos las soluciones en un array
            $soluciones = resolverEcuacionSegundoGrado($a, $b, $c);

            // Mostramos las soluciones dependiendo del tamaño del array
            if (empty($soluciones)) {
                echo "<p>No hay soluciones reales.</p>";
            } elseif (count($soluciones) == 1) {
                echo "<p>La solución única es: x = " . $soluciones[0] . "</p>";
            } else {
                echo "<p>Las soluciones son: x1 = " . $soluciones[0] . " y x2 = " . $soluciones[1] . "</p>";
            }
        }
    }
    ?>
</body>
</html>
