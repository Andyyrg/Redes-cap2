<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Palíndromo</title>
</head>
<body>
    <h1>Comprobador de Palíndromos</h1>
    <form method="post">
        <label for="cadena">Introduce una cadena:</label>
        <input type="text" id="cadena" name="cadena" required>
        <input type="submit" value="Verificar">
    </form>

    <?php
    function esPalindromo($cadena) {
        // Eliminamos los espacios y convertimos a minúsculas
        $cadena = strtolower(str_replace(' ', '', $cadena));
        // Invertimos la cadena
        $cadenaInvertida = strrev($cadena);
        // Comparamos la cadena original con la invertida
        return $cadena === $cadenaInvertida;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cadena = $_POST['cadena'];
        if (esPalindromo($cadena)) {
            echo "<p>'$cadena' es un palíndromo.</p>";
        } else {
            echo "<p>'$cadena' no es un palíndromo.</p>";
        }
    }
    ?>
</body>
</html>
