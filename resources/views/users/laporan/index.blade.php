<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Laporan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Daftar Laporan</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Isi</th>
                    <th>Kategori</th>
                    <th>File Pendukung</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporans as $laporan)
                    <tr>
                        <td>{{ $laporan->id }}</td>
                        <td>{{ $laporan->judul }}</td>
                        <td>{{ $laporan->tanggal }}</td>
                        <td>{{ $laporan->isi }}</td>
                        <td>{{ $laporan->kategori }}</td>
                        <td>
                            @if ($laporan->file_pendukung)
                                <a href="{{ Storage::url($laporan->file_pendukung) }}" target="_blank">Download</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('laporan.show', $laporan->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('laporan.edit', $laporan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
