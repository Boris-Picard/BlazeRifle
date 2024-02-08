<?php
require_once __DIR__ . '/../config/config.php';

class JWT
{
    public static function generateToken(string $email)
    {
        $header = base64_encode(json_encode(['typ' => 'JWT', 'alg' => 'HS256']));
        $payload = base64_encode(json_encode(['userMail' => $email]));
        $signature = hash_hmac('SHA256', $header . '.' . $payload . '.', SECRET_KEY);
        $jwt = $header . '.' . $payload . '.' . $signature;

        return $jwt;
    }

    public static function verifyToken($jwt)
    {
        $tokenParts = explode('.', $jwt);
        if (count($tokenParts) != 3) {
            return false;
        }
        
        $tokenHeader = $tokenParts[0];
        $tokenPayload = $tokenParts[1];
        $tokenSignature = $tokenParts[2];
    
        $unsignedToken = $tokenHeader . '.' . $tokenPayload;
        $expectedSignature = hash_hmac('SHA256', $unsignedToken, SECRET_KEY);
        var_dump($expectedSignature);
        die;
        if($tokenSignature !== $expectedSignature) {
            return false;
        }

        $decodeEmail = json_decode(base64_decode($tokenPayload));

        if(empty($decodeEmail)) {
            return false;
        }

        return $decodeEmail;
    }
}
