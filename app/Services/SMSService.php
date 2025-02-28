<?php

namespace App\Services;


use Illuminate\Support\Facades\Log;

class SMSService
{
    public function sendSMS($to, $message)
    {
        $apiKey = "adaa01589edd591f871d73d86bfcd02b52c1bed6";
        $url = "https://api.rtcom.xyz/onetomany";

        $to = preg_replace('/^(\+88|88)/', '', $to); // Remove existing 88 if present
        $to = "+88" .$to; // Ensure it starts with 88

        // Format phone number correctly (Ensure it starts with 88)
        $data = [
            "acode"=> "30000373",
            "api_key"=> $apiKey,
            "senderid"=> "8809610935210",
            "type"=> "text",
            "msg"=> $message,
            "contacts"=> $to,
            "transactionType"=>"T",
            "contentID"=>""
        ];


//        dd($data);

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
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);


        if ($httpCode != 200) {
            Log::error("SMS API Error: " . $response);
            return false; // Return false if API call fails
        }

        return json_decode($response, true);

//        return $response;
    }
}

