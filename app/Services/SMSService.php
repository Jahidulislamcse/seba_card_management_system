<?php

namespace App\Services;


class SMSService
{
    public function sendSMS($to, $message)
    {
        $apiKey = "your_fast2sms_api_key";
        $url = "https://www.fast2sms.com/dev/bulkV2";

        $data = [
            "message" => $message,
            "language" => "english",
            "route" => "q",
            "numbers" => $to,
            "sender_id" => "FSTSMS"
        ];

        $headers = [
            "authorization: $apiKey",
            "Content-Type: application/json"
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}

