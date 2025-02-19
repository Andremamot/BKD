<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>Profile Pegawai</h2>
    
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
    
        @if(isset($profileData))
            <table class="table table-bordered">
                <tr>
                    <th>NIP</th>
                    <td>{{ $profileData['data']['nip'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $profileData['data']['nama'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td>{{ $profileData['data']['jabatan'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Unit</th>
                    <td>{{ $profileData['data']['unit'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Golongan</th>
                    <td>{{ $profileData['data']['golongan'] ?? 'N/A' }}</td>
                </tr>
            </table>
        @else
            <p>Data pegawai tidak ditemukan.</p>
        @endif
    </div>
</body>
</html>