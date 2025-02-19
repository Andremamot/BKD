<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProfilePegawaiController extends Controller
{
    public function index()
    {
        $apiUrl = 'http://epresensi.bengkuluprov.go.id:94/v1/login';
        
        // Data yang dikirim untuk autentikasi (sesuaikan dengan kebutuhan)
        $credentials = [
            'username' => 'your_username',
            'password' => 'your_password',
        ];

        $client = new Client();
        
        try {
            $response = $client->post($apiUrl, [
                'json' => $credentials
            ]);

            $data = json_decode($response->getBody(), true);
            
            // Jika autentikasi berhasil, ambil token & data pegawai
            if (isset($data['data']['token'])) {
                $token = $data['data']['token'];

                // Ambil data profile pegawai dengan token yang diterima
                $profileResponse = $client->get('http://epresensi.bengkuluprov.go.id:94/v1/profile', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $token
                    ]
                ]);

                $profileData = json_decode($profileResponse->getBody(), true);

                return view('profile.index', compact('profileData'));
            } else {
                return back()->with('error', 'Login gagal, periksa username dan password.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}

