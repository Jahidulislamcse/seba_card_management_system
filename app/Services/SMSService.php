<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class SMSService
{
    public function sendSMS($to, $message)
    {
        $apiKey = "adaa01589edd591f871d73d86bfcd02b52c1bed6";
        $url = "https://api.rtcom.xyz/onetomany";

        // Format phone number (ensure it has "88" prefix)
        $to = preg_replace('/^(\+88|88)/', '', $to);
        $to = "88" . $to;

        $data = [
            "message" => $message,
            "language" => "english",
            "route" => "q",
            "numbers" => $to,
            "sender_id" => "8809610935210"
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
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Log the response for debugging
        Log::info("SMS API Request: " . json_encode($data));
        Log::info("SMS API Response: " . $response);
        Log::info("SMS API HTTP Code: " . $httpCode);

        // Check API response
        if ($httpCode != 200) {
            Log::error("SMS API Error: " . $response);
            return false;
        }

        return json_decode($response, true);
    }
}
