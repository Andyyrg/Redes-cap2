<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manejo de Variables</title>
</head>
<body>
    <h1>Manejo de Variables</h1>
    <form method="post">
        <label for="accion">Selecciona la acción:</label>
        <select id="accion" name="accion" required>
            <option value="isset">isset</option>
            <option value="is_null">is_null</option>
            <option value="empty">empty</option>
            <option value="is_int">is_int</option>
            <option value="is_float">is_float</option>
            <option value="is_bool">is_bool</option>
            <option value="is_array">is_array</option>
            <option value="intval">intval</option>
            <option value="floatval">floatval</option>
            <option value="boolval">boolval</option>
            <option value="strval">strval</option>
            <option value="strlen">strlen</option>
            <option value="explode">explode</option>
            <option value="implode">implode</option>
            <option value="strcmp">strcmp</option>
            <option value="strtolower">strtolower</option>
            <option value="strtoupper">strtoupper</option>
            <option value="substr">substr</option>
            <option value="ksort">ksort</option>
            <option value="krsort">krsort</option>
            <option value="sort">sort</option>
            <option value="rsort">rsort</option>
            <option value="array_values">array_values</option>
            <option value="array_keys">array_keys</option>
            <option value="array_key_exists">array_key_exists</option>
            <option value="count">count</option>
        </select><br><br>

        <label for="parametros">Introduce los parámetros (separados por comas):</label><br>
        <input type="text" id="parametros" name="parametros" required><br><br>

        <input type="submit" value="Ejecutar">
    </form>

    <?php
    function manejarVariable($accion, ...$parametros) {
        switch ($accion) {
            case 'isset':
                return isset($parametros[0]);
            case 'is_null':
                return is_null($parametros[0]);
            case 'empty':
                return empty($parametros[0]);
            case 'is_int':
                return is_int($parametros[0]);
            case 'is_float':
                return is_float($parametros[0]);
            case 'is_bool':
                return is_bool($parametros[0]);
            case 'is_array':
                return is_array($parametros[0]);
            case 'intval':
                return intval($parametros[0]);
            case 'floatval':
                return floatval($parametros[0]);
            case 'boolval':
                return boolval($parametros[0]);
            case 'strval':
                return strval($parametros[0]);
            case 'strlen':
                return strlen($parametros[0]);
            case 'explode':
                return explode($parametros[0], $parametros[1]);
            case 'implode':
                return implode($parametros[0], $parametros[1]);
            case 'strcmp':
                return strcmp($parametros[0], $parametros[1]);
            case 'strtolower':
                return strtolower($parametros[0]);
            case 'strtoupper':
                return strtoupper($parametros[0]);
            case 'substr':
                return substr($parametros[0], $parametros[1], $parametros[2]);
            case 'ksort':
                $arr = $parametros[0];
                ksort($arr);
                return $arr;
            case 'krsort':
                $arr = $parametros[0];
                krsort($arr);
                return $arr;
            case 'sort':
                $arr = $parametros[0];
                sort($arr);
                return $arr;
            case 'rsort':
                $arr = $parametros[0];
                rsort($arr);
                return $arr;
            case 'array_values':
                return array_values($parametros[0]);
            case 'array_keys':
                return array_keys($parametros[0]);
            case 'array_key_exists':
                return array_key_exists($parametros[0], $parametros[1]);
            case 'count':
                return count($parametros[0]);
            default:
                return "Acción no válida.";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $accion = $_POST['accion'];
        $parametrosInput = $_POST['parametros'];
        
        // Convertimos los parámetros en un array
        $parametros = array_map('trim', explode(',', $parametrosInput));

        // Ejecutamos la función
        $resultado = manejarVariable($accion, ...$parametros);
        
        // Mostramos el resultado
        echo "<h2>Resultado:</h2>";
        echo "<pre>" . print_r($resultado, true) . "</pre>";
    }
    ?>
</body>
</html>
