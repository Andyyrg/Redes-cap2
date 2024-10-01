<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar Números</title>
</head>
<body>
    <h1>Filtrar Números Menores que un Límite</h1>
    <form method="post">
        <label for="numeros">Introduce los números (separados por comas):</label><br>
        <input type="text" id="numeros" name="numeros" required><br><br>
        
        <label for="limite">Introduce el límite:</label><br>
        <input type="number" id="limite" name="limite" required><br><br>
        
        <input type="submit" value="Filtrar">
    </form>

    <?php
    function filtrarMenoresQueLimite($numeros, $limite) {
        // Creamos un nuevo array para almacenar los números menores que el límite
        $resultado = [];
        
        // Iteramos sobre cada número en el array original
        foreach ($numeros as $numero) {
            // Comprobamos si el número es menor que el límite
            if ($numero < $limite) {
                // Si es menor, lo añadimos al nuevo array
                $resultado[] = $numero;
            }
        }
        
        // Devolvemos el nuevo array
        return $resultado;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtenemos la entrada del usuario
        $numerosInput = $_POST['numeros'];
        $limite = $_POST['limite'];

        // Convertimos la cadena de números en un array
        $numeros = array_map('trim', explode(',', $numerosInput));

        // Filtramos los números
        $numerosFiltrados = filtrarMenoresQueLimite($numeros, $limite);

        // Mostramos el resultado
        echo "<h2>Números menores que $limite:</h2>";
        echo "<pre>" . print_r($numerosFiltrados, true) . "</pre>";
    }
    ?>
</body>
</html>
