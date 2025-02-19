<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        // Simulasi data user (seharusnya dari database)
        $user = [
            'username' => 'laraveltest',
            'password' => 'tEst123##' // Password dienkripsi
        ];

        // Cek apakah username sesuai
        if ($request->username === $user['username'] && Hash::check($request->password, $user['password'])) {
            // Generate token acak
            $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9lcHJlc2Vuc2kuYmVuZ2t1bHVwcm92LmdvLmlkOjk0XC92MVwvbG9naW4iLCJpYXQiOjE3Mzk5NDA1OTEsImV4cCI6MTczOTk0NDE5MSwibmJmIjoxNzM5OTQwNTkxLCJqdGkiOiJnNXRVVEYyQTlyNlBvUzFMIiwic3ViIjoiNzcwYjY4M2UtMjI1ay00NG5tLWE1MDAtZTU2YzI2Njc4ODM0IiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.XBR3uQNsLBlPWipS0eESlRoGIB5fN4WPERZkvryJ6kw';

            return response()->json([
                'success' => true,
                'message' => 'Login berhasil',
                'token' => $token
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Username atau password salah'
            ], 401);
        }
    }
}
