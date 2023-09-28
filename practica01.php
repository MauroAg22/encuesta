<style>
    body {
        background-color: #222;
        color: #fff;
        padding: 30px;
    }
</style>

<?php

function suma($num1, $num2)
{
    try {
        if (!is_numeric($num1)) {
            throw new Exception("El primer parámetro no es numérico. ($num1 )");
        }
        if (!is_numeric($num2)) {
            throw new Exception("El segundo parámetro no es numérico. (s$num2)");
        }

        return $num1 + $num2;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

echo suma(10, 20) . "<br><br>";
echo suma("ff", 4) . "<br><br>";
echo suma(30, 40) . "<br><br>";







?>