<?php

    function callApi($method, $url, $data = [], $headers = []) {
        $ch = curl_init();
        
        switch (strtoupper($method)) {
            case "POST":
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                break;
            case "PUT":
            case "PATCH":
            case "DELETE":
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                break;
            case "GET":
            default:
                if (!empty($data)) {
                    $url .= '?' . http_build_query($data);
                }
                break;
        }

        // Set URL & return transfer
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set headers
        $defaultHeaders = [
            'Content-Type: application/json',
            'Accept: application/json'
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, array_merge($defaultHeaders, $headers));

        // Execute request
        $response = curl_exec($ch);

        // Error handling
        if (curl_errno($ch)) {
            return [
                'error' => true,
                'message' => curl_error($ch)
            ];
        }

        curl_close($ch);

        // Decode JSON if possible
        $decoded = json_decode($response, true);
        return $decoded !== null ? $decoded : $response;
    }

?>