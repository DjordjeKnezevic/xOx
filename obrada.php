<?php

use League\OAuth2\Client\Provider\Google;
require '/vendor/autoload.php';
require('/vendor/league/oauth2-google/src/Provider/Google.php');
$provider = new Google([
    'clientId'     => $_ENV['PHPMAILER_CLIENTID'],
    'clientSecret' => $_ENV['PHPMAILER_CLIENTSECRET'],
    'redirectUri'  => $_ENV['PHPMAILER_REDIRECT_URI'],
]);
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['posaljiMejl'])) {

    $mail = new PHPMailer(true);
    
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  //gmail SMTP server
    $mail->SMTPAuth = true;
    //to view proper logging details for success and error messages
    // $mail->SMTPDebug = 1;
    $mail->Host = 'smtp.gmail.com';  //gmail SMTP server
    $mail->Username = $_ENV['PHPMAIL_SENDER'];   //email
    $mail->Password = $_ENV['PHPMAIL_PASSWORD'] ;   //16 character obtained from app password created
    $mail->Port = 465;                    //SMTP port
    $mail->SMTPSecure = "ssl";
    
    $mail->setFrom($_ENV['PHPMAIL_SENDER'], 'Auto mail sender');
    $mail->addAddress($_POST['mejlKa']); 
    
    $mail->isHTML(true);
    $mail->Subject = $_POST['naslovMejl'];
    $mail->Body    = $_POST['sadrzajMejl'];
    
    // Send mail   
    if (!$mail->send()) {
        header("Location: /?greska=Something went wrong:$mail->ErrorInfo");
        // echo 'Email not sent an error was encountered: ' . $mail->ErrorInfo;
    } else {
        // echo "Uspesno poslat mejl";
        header("Location: /?odgovor=Uspesno poslat mejl");
    }
    
    $mail->smtpClose();
}
else {
    header("Location: /?greska=405 REJECTED");
}


// include("includes/connect.php");


// extract($_POST);

// $message = "";

// foreach ($_POST as $key => $value) {
//     $message .= "$key: $value<br/>";
// }

// $referrer = parse_url($_SERVER['HTTP_REFERER']);
// $referrer_url = $referrer['scheme'] . '://' . $referrer['host'] . ':' . $referrer['port'] . $referrer['path'];
// header("Location: $referrer_url?message=$message");

// $filters = filter_list();
// // print_r($filters);
// foreach ($filters as $filter) {
//     echo $filter . '<br>';
// }





// echo $message;
// echo $referrer_url . "<br/>";
// echo $_SERVER['HTTP_REFERER'];

// print_r($referrer);

?>