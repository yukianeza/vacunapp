<?php 

    require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
    use Twilio\Rest\Client;

    $data['paciente_dni'] = $_GET["paciente_dni"];

    //responsable
    $data['responsable_dni'] = $_GET["responsable_dni"];
    //cita
    $data['cita_fecha'] = $_GET["cita_fecha"];

    $mensaje = "Tu cita esta reservada\n ".
                "DIA: " . $data['cita_fecha'] . " \n".
                "DNI PACIENTE: " . $data['paciente_dni'] . " \n".
                "DNI RESPONSABLE: " . $data["responsable_dni"] . " \n" .
                "LLEGAR CON 15 MINUTOS DE ANTICIPACION ! Y PRESENTAR AMBOS DNI";
    $account_sid = 'AC9e4c4cf0a7de6a907cead645d4436c56';
    $auth_token = '8f9b192b8690d3cccd7e86a37523c187';
    // In production, these should be environment variables. E.g.:
    // $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]
    // A Twilio number you own with SMS capabilities
    $twilio_number = "+19704067463";
    $client = new Client($account_sid, $auth_token);
    $client->messages->create(
            // the number you'd like to send the message to
            '+51942702211',
            [
                // A Twilio phone number you purchased at twilio.com/console
                'from' => $twilio_number,
                // the body of the text message you'd like to send
                'body' => $mensaje
            ]
    );
    header("Location: http://localhost:8090/vacunapp/citas.php");
    exit();
?>