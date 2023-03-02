<?php

session_start();
if (
    !(isset($_SESSION['nizX']) && isset($_SESSION['nizO'])
        && isset($_SESSION['pisiX']) && isset($_SESSION['endGame'])
        && $_SESSION['nizX'] != [])
) {
    $_SESSION['nizX'] = [];
    $_SESSION['nizO'] = [];
    $_SESSION['pisiX'] = true;
    $_SESSION['endGame'] = false;
} else {
    header('Content-Type: application/json');
    $response = array(
        "nizX" => $_SESSION['nizX'],
        "nizO" => $_SESSION['nizO']
    );

    echo json_encode($response);
}

?>