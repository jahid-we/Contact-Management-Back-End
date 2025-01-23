<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{
    /**
     * Create a JWT Token
     *
     * This method creates a JWT token and returns it.
     *
     * $email The email of the user.
     * $userId The ID of the user.
     * $role The role of the user.
     * The JWT token.
     */
    // public static function createToken($email, $userId, $role): string
    // {
    //     try {
    //         $key = env('JWT_KEY');
    //         $payload = [
    //             'iss' => 'LaravelJH',
    //             'iat' => time(),
    //             'exp' => time() + 60 * 60,
    //             'email' => $email,
    //             'userId' => $userId,
    //             'role' => $role,
    //         ];

    //         return JWT::encode($payload, $key, 'HS256');
    //     } catch (Exception $e) {
    //         return ResponseHelper::out(false, 'Something went wrong', 500);
    //     }
    // }

    public static function createToken($email, $id, $role): string
    {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'laravel-token',
            'iat' => time(),
            'exp' => time() + 5 * 60 * 60,
            'email' => $email,
            'userId' => $id,
            'role' => $role,
        ];

        return JWT::encode($payload, $key, 'HS256');
    }

    /**
     * Verify a JWT Token
     *
     * This method verifies a JWT token and returns the decoded payload.
     *
     * $token The JWT token to verify.
     * The decoded payload of the JWT token.
     */
    public static function verifyToken($token): string|object
    {
        try {
            if ($token == null) {
                return 'unauthorized';
            } else {
                $key = env('JWT_KEY');
                $decode = JWT::decode($token, new Key($key, 'HS256'));

                return $decode;
            }
        } catch (Exception $e) {
            return 'unauthorized';
        }
    }
}
