<!DOCTYPE html>
<html lang="en">

<head>  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tabel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

<body>



    <div class="container">
        <h2>Data Pegawai</h2>
        <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3">Tambah Pegawai</a>

        @if (isset($pegawai) && $pegawai->count() > 0)
            @foreach ($pegawai as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->pegawai_nip }}</td>
                    <td>{{ $p->pegawai_nama }}</td>
                    <td>{{ $p->pegwai_jabatan }}</td>
                    <td>{{ $p->pegawai_golongan }}</td>
                    <td>{{ $p->pegawai_unor }}</td>
                    <td>
                        <a href="{{ route('pegawai.edit', $p->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                        <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7" class="text-center">Data pegawai tidak ditemukan.</td>
            </tr>
        @endif

        </tbody>
        </table>
    </div>
</body>

</html>
