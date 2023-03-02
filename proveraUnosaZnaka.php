<?php
session_start();
if (isset($_POST['tablaLeft']) && isset($_POST['tablaTop'])) {
    $_SESSION['tablaLeft'] = $_POST['tablaLeft'];
    $_SESSION['tablaTop'] = $_POST['tablaTop'];
} else if (
    isset($_POST['hOffset']) && isset($_POST['vOffset'])
    && isset($_POST['objLeft']) && isset($_POST['objTop'])
    && isset($_POST['objWidth']) && isset($_POST['objHeight'])
    && isset($_POST['fixH']) && isset($_POST['fixV'])
    && isset($_SESSION['tablaLeft']) && isset($_SESSION['tablaTop'])
    && $_POST['hOffset'] != "Rick" && $_POST['vOffset'] != "Astley"
    && $_POST['objLeft'] - ($_SESSION['tablaLeft'] + ($_POST['objWidth'] * $_POST['hOffset']) + $_POST['fixH']) < 2
    && -$_POST['objLeft'] + ($_SESSION['tablaLeft'] + ($_POST['objWidth'] * $_POST['hOffset']) + $_POST['fixH']) < 2
    && $_POST['objTop'] - ($_SESSION['tablaTop'] + ($_POST['objHeight'] * $_POST['vOffset']) + $_POST['fixV']) < 2
    && -$_POST['objTop'] + ($_SESSION['tablaTop'] + ($_POST['objHeight'] * $_POST['vOffset']) + $_POST['fixV']) < 2
) {

    if ($_SESSION['endGame'] === false) {
        if ($_SESSION['pisiX'] === true) {
            $_SESSION['pisiX'] = false;
            array_push($_SESSION['nizX'], [$_POST['hOffset'], $_POST['vOffset']]);
            // echo '<i class="fa-solid fa-x ikonica text-white"></i>';
            print_r($_SESSION['nizX']);
        } else {
            $_SESSION['pisiX'] = true;
            array_push($_SESSION['nizO'], [$_POST['hOffset'], $_POST['vOffset']]);
            // echo '<i class="fa-solid fa-o ikonica text-white"></i>';
            print_r($_SESSION['nizO']);
        }
    }

} else {
    $_SESSION['Rick'] = "Astley";
    echo $_SESSION['Rick'];
    // echo $_POST['objLeft'] - ($_SESSION['tablaLeft'] + ($_POST['objWidth'] * $_POST['hOffset']) + $_POST['fixH']);
    // echo $_POST['objTop'] - ($_SESSION['tablaTop'] + ($_POST['objHeight'] * $_POST['vOffset']) + $_POST['fixV']);
}


?>