<?php
namespace App\Helpers;

class WhatsAppHelper
{
    public  static function generate_password($length) {
        // define character sets to use in password
        $uppercase_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $number_chars = '0123456789';

        // generate random characters from each set
        $rand_uppercase_char = $uppercase_chars[rand(0, strlen($uppercase_chars)-1)];
        $rand_number_char = $number_chars[rand(0, strlen($number_chars)-1)];

        // generate random characters from remaining length
        $rand_password_chars = '';
        $remaining_length = $length - 2;
        for ($i = 0; $i < $remaining_length; $i++) {
            $rand_password_chars .= $uppercase_chars[rand(0, strlen($uppercase_chars)-1)];
        }

        // combine generated characters and shuffle them
        $rand_password_chars .= $rand_uppercase_char . $rand_number_char;
        $rand_password_chars = str_shuffle($rand_password_chars);

        // return random password
        return $rand_password_chars;
    }


    public static function whatsappNotification(string $recipient, string $random_password)
    {
        $sid    = getenv("TWILIO_ACCOUNT_SID");
        $token  = getenv("TWILIO_AUTH_TOKEN");

        $wa_from= getenv("TWILIO_WHATSAPP_FROM");
        // $twilio = new Client($sid, $token);

        $body = "Felicidades, Puede iniciar sesión con la siguiente contraseña. por favor inicie sesión ahora." . $random_password;

        // $message = $twilio->messages->create("whatsapp:$recipient",["from" => "whatsapp:$wa_from", "body" => $body]);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://'.$sid.':'.$token.'@api.twilio.com/2010-04-01/Accounts/'.$sid.'/Messages.json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('To' => "whatsapp:$recipient",'From' => "whatsapp:$wa_from",'Body' => $body),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;

    }

}
